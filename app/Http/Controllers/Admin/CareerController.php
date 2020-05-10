<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use App\CareerApplication;
use App\Http\Controllers\Controller;
use App\Responsibility;
use Illuminate\Http\Request;
use Validator;

class CareerController extends Controller
{


    /**
     * CareerController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }


    public function index()
    {

        $careers = Career::all();

        $responsibilities = Responsibility::all();

        return view('backend.careers.list', compact('careers', 'responsibilities'));
    }

    public function create()
    {
        return view('backend.careers.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'work_status' => 'required',
            'experience' => 'required',
            'qualifications' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);


        $career = new Career();
        $career->title = $request->title;
        $career->work_status = $request->work_status;
        $career->experience = $request->experience;
        $career->qualifications = $request->qualifications;
        $career->location = $request->location;
        $career->salary = $request->salary;
        $career->description = $request->description;
        $career->deadline = date('Y-m-d', strtotime($request->deadline));

        $career->save();

        $notification = array(
            'message' => 'Career created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('career.list'))->with($notification);


    }

    public function edit($id)
    {
        $career = Career::find($id);

        return view('backend.careers.edit', compact('career'));
    }

    public function view($id)
    {
        $career = Career::find($id);

        return view('backend.careers.view', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'work_status' => 'required',
            'experience' => 'required',
            'qualifications' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);


        $career = Career::find($id);
        $career->title = $request->title;
        $career->work_status = $request->work_status;
        $career->experience = $request->experience;
        $career->qualifications = $request->qualifications;
        $career->location = $request->location;
        $career->salary = $request->salary;
        $career->description = $request->description;
        $career->deadline = date('Y-m-d', strtotime($request->deadline));

        $career->save();

        $notification = array(
            'message' => 'Career updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('career.list'))->with($notification);
    }

    public function createRes($id)
    {

        $career = Career::find($id);

        return view('backend.careers.createRes', compact('career'));

    }

    public function storeRes(Request $request, $id)
    {


        $rules = [];

        foreach ($request->input('responsibility') as $key => $value) {
            $rules["responsibility.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            foreach ($request->input('responsibility') as $key => $value) {
                Responsibility::create([
                    'career_id' => $id,
                    'description' => $value
                ]);
            }

            $notification = array(
                'message' => 'Career responsibilities created successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('career.list'))->with($notification);
        }

        $notification = array(
            'message' => 'Responsibilities  create failed successfully',
            'alert-type' => 'error'
        );

        return redirect()->to(route('career.list'))->with($notification);

    }

    public function editRes($id)
    {

        $responsibilities = Responsibility::where('career_id', $id)->get();
        $career = Career::find($id);

        return view('backend.careers.editRes', compact('responsibilities', 'career'));

    }

    public function updateRes(Request $request, $id)
    {
        $rules = [];

        foreach ($request->input('responsibility') as $key => $value) {
            $rules["responsibility.{$key}"] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {


            foreach ($request->input('responsibility') as $key => $value) {
                $responsibility = Responsibility::find($request->input('id')[$key]);
                $responsibility->description = $value;
                $responsibility->save();
            }


            $notification = array(
                'message' => 'Career responsibilities updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('career.list'))->with($notification);
        }

        $notification = array(
            'message' => 'Responsibilities  create failed successfully',
            'alert-type' => 'error'
        );

        return redirect()->to(route('career.list'))->with($notification);

    }

    public function deleteRes($id)
    {
        $responsibility = Responsibility::find($id);
        $responsibility->delete();
        $notification = array(
            'message' => 'Responsibilities deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ApplicationList(){

        $applications = CareerApplication::orderBy('job_id','ASC')->get();

        return view('backend.careers.applications_list',compact('applications'));
    }

    public function ApplicationView($id){

        $application = CareerApplication::find($id);

        return view('backend.careers.application_view',compact('application'));
    }
}
