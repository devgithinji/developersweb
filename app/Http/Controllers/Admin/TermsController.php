<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Term;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:employee');
    }

    public function index(){
        $terms = Term::all();


        return view('backend.terms.list',compact('terms'));
    }

    public function create(){
        return view('backend.terms.term_create');
    }

    public function View(){
        $terms = Term::all();

        return view('backend.terms.term_view',compact('terms'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'term' => 'required'
        ]);


        $term = new Term();
        $term->term = $request->term;
        $term->save();

        $notification=array(
            'message'=>'Term Created successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('terms.list'))->with($notification);
    }

    public function edit($id){

        $term = Term::find($id);

        return view('backend.terms.term_edit',compact('term'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'term' => 'required'
        ]);


        $term = Term::find($id);
        $term->term = $request->term;
        $term->save();

        $notification=array(
            'message'=>'Term Updated successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('terms.list'))->with($notification);
    }

    public function delete($id){
        $term = Term::find($id);
        $term->delete();
        $notification=array(
            'message'=>'Term Deleted successfully',
            'alert-type'=>'success'
        );

        return redirect()->to(route('terms.list'))->with($notification);
    }
}
