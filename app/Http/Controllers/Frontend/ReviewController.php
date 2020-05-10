<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{


    /**
     * ReviewController constructor.
     */
    public function __construct()
    {
         $this->middleware(['auth','verified']);
    }

    public function create(){
        return view('frontend.user.review_create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'review' => 'required'
        ]);

        $review = new Review();
        $review->user_id = Auth::user()->id;
        $review->review = $request->review;
        $review->status = 0;
        $review->save();


        return redirect()->back()->with('success','Review created successfully');

    }


    public function edit($id){

        $review = Review::find($id);

        return view('frontend.user.review_edit',compact('review'));
    }

    public function view($id){
        $review = Review::find($id);

        return view('frontend.user.review_view',compact('review'));
    }


    public function update(Request $request,$id){
        $this->validate($request,[
            'review' => 'required'
        ]);

        $review = Review::find($id);
        $review->review = $request->review;
        $review->save();


        return redirect()->back()->with('success','Review Updated successfully');
    }

    public function delete($id){

        $review = Review::find($id);
        $review->delete();

        return redirect()->to(route('account'))->with('success','Review deleted successfully');
    }
}
