<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:employee');
    }

    public function index(){
        $faqs = Faq::all();


        return view('backend.faq.list',compact('faqs'));
    }

    public function create(){
        return view('backend.faq.Faq_create');
    }

    public function View(){
        $faqs = Faq::all();

        return view('backend.faq.faq_view',compact('faqs'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'question' => 'required',
            'answer' => 'required'
        ]);


        $faq = new Faq();
        $faq->question= $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $notification=array(
            'message'=>'Faq Created successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('faq.list'))->with($notification);
    }

    public function edit($id){

        $faq = Faq::find($id);

        return view('backend.faq.Faq_edit',compact('faq'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'question' => 'required',
            'answer' => 'required'
        ]);


        $faq = Faq::find($id);
        $faq->question= $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $notification=array(
            'message'=>'Faq Updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('faq.list'))->with($notification);
    }

    public function delete($id){
        $faq = Faq::find($id);
        $faq->delete();
        $notification=array(
            'message'=>'Faq Deleted successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('faq.list'))->with($notification);
    }
}
