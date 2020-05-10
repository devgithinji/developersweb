<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{


    /**
     * ShopCategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(){
        $categories = ShopCategory::all();
        return view('backend.shop.list',compact('categories'));
    }

    public function create(){
        return view('backend.shop.create');
    }

    public function edit($id){
        $category = ShopCategory::find($id);
        return view('backend.shop.edit',compact('category'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $shopcategory = new ShopCategory();
        $shopcategory->name = $request->name;
        $shopcategory->status = 0;
        $shopcategory->save();

        $notification = array(
            'message' => 'Category  created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.categories.list'))->with($notification);

    }

    public function update(Request $request,$id){

        $this->validate($request,[
            'name' => 'required|string'
        ]);

        $shopcategory = ShopCategory::find($id);
        $shopcategory->name = $request->name;
        $shopcategory->save();

        $notification = array(
            'message' => 'Category  updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.categories.list'))->with($notification);

    }

    public function statusUpdate($id,$status_id){

        $category = ShopCategory::find($id);
        $category->status = $status_id;
        $category->save();


        $notification = array(
            'message' => 'Category status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.categories.list'))->with($notification);

    }


    public function delete($id){
        $category = ShopCategory::find($id);
        $category->delete();

        $notification = array(
            'message' => 'Category deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.categories.list'))->with($notification);
    }
}
