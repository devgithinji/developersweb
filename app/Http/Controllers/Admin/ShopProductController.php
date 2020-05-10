<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProductSpecification;
use Validator;
use App\ShopCategory;
use App\ShopProduct;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ShopProductController extends Controller
{

    /**
     * ShopProductController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(){
        $products = ShopProduct::all();
        return view('backend.shop.products_list',compact('products'));
    }

    public function create(){

        $categories = ShopCategory::all();
        return view('backend.shop.products_create',compact('categories'));
    }

    public function edit($id){
        $product = ShopProduct::find($id);
        $categories = ShopCategory::all();

        return view('backend.shop.product_edit',compact('product','categories'));
    }

    public function view($id){
        $product = ShopProduct::find($id);

        return view('backend.shop.product_view',compact('product'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);

        $product = new ShopProduct();

        if ($request->hasFile('image')){
            $random_no = rand(9999,9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $medium_image = 'medium_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


            Image::make($file)->resize(60, 60)->save(public_path('productImage/'.$small_image));
            Image::make($file)->resize(268, 306)->save(public_path('productImage/'.$medium_image));
            Image::make($file)->resize(370, 423)->save(public_path('productImage/'.$large_image));

            $product->small_image = $small_image;
            $product->medium_image = $medium_image;
            $product->large_image = $large_image;

        }

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status  = 0;
        $product->save();


        $notification = array(
            'message' => 'Product created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.products.list'))->with($notification);

    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $product = ShopProduct::find($id);

        if ($request->hasFile('image')){
            $random_no = rand(9999,9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $medium_image = 'medium_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;
            $large_image = 'large_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;

            unlink(public_path('productImage/'.$product->small_image));
            unlink(public_path('productImage/'.$product->medium_image));
            unlink(public_path('productImage/'.$product->large_image));


            Image::make($file)->resize(60, 60)->save(public_path('productImage/'.$small_image));
            Image::make($file)->resize(268, 306)->save(public_path('productImage/'.$medium_image));
            Image::make($file)->resize(370, 423)->save(public_path('productImage/'.$large_image));

            $product->small_image = $small_image;
            $product->medium_image = $medium_image;
            $product->large_image = $large_image;

        }

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->status  = 0;
        $product->save();


        $notification = array(
            'message' => 'Product created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.products.list'))->with($notification);

    }

    public function delete($id){

        $product = ShopProduct::find($id);

        unlink(public_path('productImage/'.$product->small_image));
        unlink(public_path('productImage/'.$product->medium_image));
        unlink(public_path('productImage/'.$product->large_image));

        $product->delete();

        $notification = array(
            'message' => 'Product deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.products.list'))->with($notification);

    }

    public function  statusUpdate($id,$status_id){

        $product = ShopProduct::find($id);

        $product->status = $status_id;
        $product->save();

        $notification = array(
            'message' => 'Product status updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('shop.products.list'))->with($notification);

    }

    public function createspecs($id){
        $product = ShopProduct::find($id);

        return view('backend.shop.specification_create',compact('product'));
    }


    public function storespecs(Request $request,$id){

        $rules = [];

        foreach ($request->input('specification') as $key => $value) {
            $rules["specification.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            foreach ($request->input('specification') as $key => $value) {
               ProductSpecification::create([
                    'product_id' => $id,
                    'specification' => $value
                ]);
            }

            $notification = array(
                'message' => 'Product Specifications created successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('shop.products.list'))->with($notification);
        }

        $notification = array(
            'message' => 'Responsibilities  create failed',
            'alert-type' => 'error'
        );

        return redirect()->to(route('shop.products.list'))->with($notification);
    }


    public function editspecs($id){

        $product = ShopProduct::find($id);
        $specifications = ProductSpecification::where('product_id',$id)->get();

        return view('backend.shop.product_specs_edit',compact('product','specifications'));

    }

    public function deletespecs($id){

        $specification = ProductSpecification::find($id);
        $specification->delete();

        $notification = array(
            'message' => 'Specification deleted',
            'alert-type' => 'success'
        );

        return redirect()->back()->with( $notification);

    }
}
