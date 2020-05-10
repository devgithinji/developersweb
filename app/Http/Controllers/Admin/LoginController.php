<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest:employee')->except('logout');
    }

    public function showloginForm(){
        if (Auth::id()){
            return redirect()->back();
        }else{
            return view('backend.login');
        }
    }

    protected  $redirectTo = '/dashboard';

    protected function guard(){
        return Auth::guard('employee');
    }



}
