<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PageImages;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PageImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }
    
    
    public function index(){
        $images = PageImages::all();
        return view('backend.pageImages.list',compact('images'));
    }
    
    
    public function create(){
        return view('backend.pageImages.pageimage_create');
    }
    
    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);

        $image = new PageImages();

        if ($request->hasFile('image')) {
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


            Image::make($file)->resize(200, 150)->save(public_path('pageImages/' . $small_image));
            Image::make($file)->resize(2000, 1200)->save(public_path('pageImages/' . $large_image));

            $image->small_image = $small_image;
            $image->large_image = $large_image;

        }

        $image->name = $request->name;
        $image->save();


        $notification = array(
            'message' => 'Page image created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('page.images.list'))->with($notification);
        
    }

    public function delete($id){

        $pageImage = PageImages::find($id);

        unlink(public_path('pageImages/' . $pageImage->small_image));
        unlink(public_path('pageImages/' . $pageImage->large_image));

        $pageImage->delete();

        $notification = array(
            'message' => 'Page Image deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('page.images.list'))->with($notification);


    }
}
