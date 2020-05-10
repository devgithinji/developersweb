<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(){
        return view('backend.home');
    }


    public  function logout(){
        Auth::logout();

        return redirect()->route('employee.login');
    }
}
