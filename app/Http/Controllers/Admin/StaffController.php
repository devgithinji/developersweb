<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\EmployeeProfile;
use App\Http\Controllers\Controller;
use App\Mail\CreateStaffMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

class StaffController extends Controller
{


    /**
     * StaffController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index()
    {
        $page_name = "Staff List";

        $employees = Employee::all();

        return view('backend.staff.list', compact('page_name','employees'));
    }

    public function viewProfiles(){

        $page_name = "Staff List";

        $employees = Employee::all();

        return view('backend.staff.list_profile', compact('page_name','employees'));
    }

    public function create()
    {
        $page_name = "Staff Create";
        return view('backend.staff.create', compact('page_name'));
    }


    public function profileEdit($id)
    {

        $profile = EmployeeProfile::where('user_id', $id)->first();

        $page_name = "Staff Profile Edit";
        return view('backend.staff.profile', compact('page_name', 'profile'));
    }

    public function view($id){
        $profile = EmployeeProfile::where('user_id', $id)->first();

        $page_name = "Staff Profile view";
        return view('backend.staff.view', compact('page_name', 'profile'));
    }

    public function avatarUpload(Request $request, $id)
    {


        $this->validate($request, [
            'avatar' => 'mimes:jpeg,jpg,png,gif|required'
        ]);

        $profile = EmployeeProfile::find($id);

        if ($request->hasFile('avatar')) {

            if ($profile->avatar_small != null && $profile->avatar_medium != null ){

                unlink(public_path('/staffavatar/' . $profile->avatar_small));
                unlink(public_path('/staffavatar/' . $profile->avatar_medium));
            }

            $user_id = $profile->user_id;
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $small_image = 'small_image' . date('H-i-s') . '_' . $user_id . '.' . $extension;
            $medium_image = 'medium_image' . date('H-i-s') . '_' . $user_id . '.' . $extension;


            Image::make($file)->resize(100, 100)->save(public_path('staffavatar/'.$small_image));
            Image::make($file)->resize(500, 600)->save(public_path('staffavatar/'.$medium_image));

            $profile->avatar_small = $small_image;
            $profile->avatar_medium = $medium_image;

            $profile->save();

            $notification = array(
                'message' => 'avatar uploaded successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        }


    }

    public function avatarDelete()
    {

    }

    public function resumeUpload(Request $request, $id)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $profile = EmployeeProfile::find($id);
        $resume = $profile->resume;

        if (!$resume == null) {
            Storage::delete($resume);
        }

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');

            $extension = $resume->getClientOriginalExtension();

            $resume_name = 'resume'.'_'.$profile->user_id.'_'.date('Y-m-d_H-i-s').'.'.$extension;

            $path = $resume->storeAs('public/resume',$resume_name);

            $profile->resume = $path;
            $profile->save();
        }

        $notification = array(
            'message' => 'Resume uploaded successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function personalSettings(Request $request, $id)
    {
        $user = Employee::find($id);

        $this->validate($request, [
            'name' => 'string|required',
            'title' => 'string',
            'position' => 'string',
            'phone_number' => 'required',
            'email' => 'required|email|unique:employees,email,' . $user->id . ',id',
            'address' => 'required',
            'skills' => 'required',
            'birthday' => 'required',
            'country' => 'string',
            'city_town' => 'string',
        ]);

        $profile = EmployeeProfile::find($id);
        $profile->title = $request->title;
        $profile->position = $request->position;
        $profile->skills = $request->skills;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;
        $profile->birthday = date('Y-m-d', strtotime($request->birthday));
        $profile->country = $request->country;
        $profile->city_town = $request->city_town;
        $profile->save();

        $notification = array(
            'message' => 'Profile Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function personalLinks(Request $request, $id)
    {
        $this->validate($request, [
            'facebook_account' => 'url',
            'twitter_account' => 'url',
            'linkedin_account' => 'url',
            'website_url' => 'url',
            'description' => 'required'
        ]);

        $profile = EmployeeProfile::find($id);
        $profile->facebook_account = $request->facebook_account;
        $profile->twitter_account = $request->twitter_account;
        $profile->linkedin_account = $request->linkedin_account;
        $profile->website_url = $request->website_url;
        $profile->description = $request->description;
        $profile->save();

        $notification = array(
            'message' => 'Profile Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'position' => 'required',
            'email' => 'email|required|unique:employees|string|max:100'
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $password = Str::random(8);
        $employee->password = Hash::make($password);
        $employee->save();

        //create a profile
        $employeeProfile = new EmployeeProfile();
        $employeeProfile->user_id = $employee->id;
        $employeeProfile->gender = $request->gender;
        $employeeProfile->position= $request->position;
        $employeeProfile->save();

        //send email
        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'mailer_email' => Auth::user()->email,
            'mailer_name' => Auth::user()->name,
            'mailer_position' => Auth::user()->profile->title,
            'mailer_phone' =>  Auth::user()->profile->phone_number,
            'password' => $password,
            'loginUrl' => route('employee.show.login'),
        ];

        $emailTo = $request->email;

        try{
            Mail::to($emailTo)->send(new CreateStaffMail($data));
        }catch (Exception $e){
            return redirect()->back()->with('err_message','Sorry something went wrong. Please try later');
        }

        $notification = array(
            'message' => 'Staff Created successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('staff.list'))->with($notification);

    }


    public function dismiss($id){

        $employee = Employee::find($id);
        $employee->delete();


        $notification = array(
            'message' => 'Staff dismissed successfully',
            'alert-type' => 'success'
        );

        return redirect()->to(route('staff.list'))->with($notification);
    }
}
