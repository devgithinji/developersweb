<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index()
    {

        $posts = Post::all();

        return view('backend.blog.list', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::all();

        return view('backend.blog.post_create', compact('categories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);

        $post = new Post();

        if ($request->hasFile('image')) {
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


            Image::make($file)->resize(420, 300)->save(public_path('postImage/' . $small_image));
            Image::make($file)->resize(870, 522)->save(public_path('postImage/' . $large_image));

            $post->small_image = $small_image;
            $post->large_image = $large_image;

        }

        $post->title = $request->name;
        $post->category_id = $request->category;
        $post->desc = $request->description;
        $post->creator = Auth::user()->name;
        $post->status = 0;
        $post->save();


        $notification = array(
            'message' => 'Post created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.list'))->with($notification);

    }


    public function edit($id)
    {

        $post = Post::find($id);

        $categories = PostCategory::all();

        return view('backend.blog.post_edit', compact('categories', 'post'));
    }

    public function view($id){
        $post = Post::find($id);

        return view('backend.blog.post_view', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $post = Post::find($id);

        if ($request->hasFile('image')) {
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


            unlink(public_path('postImage/' . $post->small_image));
            unlink(public_path('postImage/' . $post->large_image));


            Image::make($file)->resize(420, 300)->save(public_path('postImage/' . $small_image));
            Image::make($file)->resize(870, 522)->save(public_path('postImage/' . $large_image));

            $post->small_image = $small_image;
            $post->large_image = $large_image;

        }

        $post->title = $request->name;
        $post->category_id = $request->category;
        $post->desc = $request->description;
        $post->save();


        $notification = array(
            'message' => 'Post updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.list'))->with($notification);

    }

    public function postStatusUpdate($id,$status_id){

        $post = Post::find($id);
        $post->status = $status_id;

        $post->save();

        $notification = array(
            'message' => 'Post status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.list'))->with($notification);


    }

    public function delete($id){

        $post = Post::find($id);

        unlink(public_path('postImage/' . $post->small_image));
        unlink(public_path('postImage/' . $post->large_image));

        $post->delete();

        $notification = array(
            'message' => 'Post deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.list'))->with($notification);

    }
}
