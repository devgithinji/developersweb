<?php

namespace App\Http\Controllers\Admin;

use App\EmployerLogo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployerLogoController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:employee');
    }


    public  function index(){
        $logos = EmployerLogo::all();

        return view('backend.employerLogo.list',compact('logos'));
    }

    public function create(){
        return view('backend.employerLogo.logo_create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif|required'
        ]);


        $logo = new EmployerLogo();


        if ($request->hasFile('image')){
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'employer_logo' . date('H-i-s') . '_' . $random_no . '.' . $extension;

            Image::make($file)->resize(218, 150)->save(public_path('employerLogo/' . $image));

            $logo->photo = $image;

        }

        $logo->name = $request->name;
        $logo->save();


        $notification=array(
            'message'=>'Employer Logo successfully created',
            'alert-type'=>'success'
        );

        return redirect()->to(route('logo.list'))->with($notification);
    }

    public function edit($id){


        $logo = EmployerLogo::find($id);

        return view('backend.employerLogo.logo_edit',compact('logo'));

    }


    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|string',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);


        $logo = EmployerLogo::find($id);


        if ($request->hasFile('image')){
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $image = 'employer_logo' . date('H-i-s') . '_' . $random_no . '.' . $extension;

            if ($logo->photo != null){
                unlink(public_path('employerLogo/' . $logo->photo));
            }

            Image::make($file)->resize(218, 150)->save(public_path('employerLogo/' . $image));

            $logo->photo = $image;

        }

        $logo->name = $request->name;
        $logo->save();


        $notification=array(
            'message'=>'Employer Logo successfully updated',
            'alert-type'=>'success'
        );

        return redirect()->to(route('logo.list'))->with($notification);
    }


    public function delete($id){

        $logo = EmployerLogo::find($id);
        $logo->delete();



        $notification=array(
            'message'=>'Employer Logo successfully deleted',
            'alert-type'=>'success'
        );

        return redirect()->to(route('logo.list'))->with($notification);

    }
}
