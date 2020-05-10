<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    /**
     * ReviewsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }


    public function index(){
        $reviews = Review::all();

        return view('backend.services.reviews',compact('reviews'));
    }


    public function statusUpdate($id,$status){

        $review = Review::find($id);
        $review->status = $status;
        $review->save();

        $notification = array(
            'message' => 'Review Status Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function view($id){
        $review = Review::find($id);

        return view('backend.services.review_view',compact('review'));
    }
}
