<?php

namespace App\Http\Controllers\Frontend;

use App\cart;
use App\Http\Controllers\Controller;
use App\ShopCategory;
use App\ShopProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function shop()
    {

        $products = ShopProduct::paginate(9);
        $prods = ShopProduct::all()->random(3);
        $categories = ShopCategory::all();

        return view('frontend.shop.shop', compact('products', 'categories','prods'));
    }


    public function categoryProducts($id){
        $products = ShopProduct::where('category_id',$id)->paginate(9);
        $prods = ShopProduct::all()->random(3);
        $categories = ShopCategory::all();

        return view('frontend.shop.shop', compact('products', 'categories','prods'));
    }


    public function productView($id)
    {
        $product = ShopProduct::find($id);
        return view('frontend.shop.singleproduct', compact('product'));

    }

    public function cartList()
    {

        $products = cart::where('user_id', Auth::user()->id)->get();


        return view('frontend.shop.cart', compact('products'));

    }

    public function cartAdd(Request $request, $id)
    {

        $product_num = Cart::where('product_id', $id)->count();

        if ($product_num >= 1) {
            return redirect()->to(route('cart.list'))->with('error', 'product exists in cart');
        } else {

            $product = new cart();

            $product->user_id = Auth::user()->id;
            $product->product_id = $id;
            if ($request->has('quantity')) {
                $product->quantity = $quantity = $request->quantity;
            } else {
                $product->quantity = $quantity = 1;
            }

            $product->total = $product->pdct->price * $quantity;

            $product->save();

            return redirect()->to(route('cart.list'))->with('success', 'product added to cart successfully');
        }


    }

    public function removeProduct($id)
    {

        $product = cart::find($id);
        $product->delete();

        return redirect()->to(route('cart.list'))->with('success', 'product removed from cart successfully');

    }
}
