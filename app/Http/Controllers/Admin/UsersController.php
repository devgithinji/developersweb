<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:employee');
    }


    public function index(){

        $users = User::all();

        return view('backend.clients.list',compact('users'));
    }


    public function viewUser($id){
        $user = User::find($id);

        return view('backend.clients.user_view',compact('user'));
    }

    public function indexProfiles(){
        $users = User::all();
        return view('backend.clients.list_profile',compact('users'));
    }
}
