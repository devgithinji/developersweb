<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(){

        $categories = PostCategory::all();

        return view('backend.blog.category_list',compact('categories'));
    }


    public function create(){
        return view('backend.blog.category_create');
    }


    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $category = new PostCategory();
        $category->name = $request->name;
        $category->status = 0;
        $category->save();

        $notification = array(
            'message' => 'Post Category Created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.categories.list'))->with($notification);

    }

    public function edit($id){

        $category = PostCategory::find($id);

        return view('backend.blog.category_edit',compact('category'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $category = PostCategory::find($id);
        $category->name = $request->name;
        $category->save();

        $notification = array(
            'message' => 'Post Category updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.categories.list'))->with($notification);

    }

    public function delete($id){
        $category = PostCategory::find($id);
        $category->delete();

        $notification = array(
            'message' => 'Post Category deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.categories.list'))->with($notification);
    }

    public function categoryStatusUpdate($id,$status_id){
        $category = PostCategory::find($id);
        $category->status = $status_id;
        $category->save();

        $notification = array(
            'message' => 'Post Category status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('post.categories.list'))->with($notification);

    }
}
