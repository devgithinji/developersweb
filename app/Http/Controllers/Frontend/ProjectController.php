<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * ProjectController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function view($id){
        $project = Project::find($id);

        return view('frontend.user.project_view',compact('project'));
    }
}
