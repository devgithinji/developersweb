<?php

namespace App\Http\Controllers\Frontend;

use App\Career;
use App\CareerApplication;
use App\ContactUsSettings;
use App\Employee;
use App\EmployerLogo;
use App\Faq;
use App\Http\Controllers\Controller;
use App\PageSetting;
use App\Post;
use App\PostCategory;
use App\Project;
use App\ProjectPhoto;
use App\ProjectProposal;
use App\Review;
use App\Service;
use App\ServicePrice;
use App\ShowCaseProject;
use App\Term;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontEndController extends Controller
{

    /**
     * FrontEndController constructor.
     */
    public function __construct()
    {
        $this->middleware('web');

        $this->middleware(['auth', 'verified'])->only(['account', 'careersApplicationStore']);
    }

    public function index()
    {

        $settings = PageSetting::all();


        foreach ($settings as $key => $setting) {
            if ($key == 0) $system_logo = $setting->value;
            elseif ($key == 1) $hero_img = $setting->value;
            elseif ($key == 2) $hero_title = $setting->value;
            elseif ($key == 3) $hero_description = $setting->value;
            elseif ($key == 4) $company_img = $setting->value;
            elseif ($key == 5) $company_description = $setting->value;
            elseif ($key == 6) $company_mission = $setting->value;
            elseif ($key == 7) $company_vision = $setting->value;
            elseif ($key == 8) $projects_description = $setting->value;
            elseif ($key == 9) $services_description = $setting->value;
            elseif ($key == 10) $team_description = $setting->value;
            elseif ($key == 11) $reviews_image = $setting->value;
        }

        $sharedData = [
            'system_logo' => $system_logo,
            'hero_img' => $hero_img,
            'hero_title' => $hero_title,
            'hero_description' => $hero_description,
            'company_img' => $company_img,
            'company_decription' => $company_description,
            'company_mission' => $company_mission,
            'company_vision' => $company_vision,
            'projects_description' => $projects_description,
            'services_descrpition' => $services_description,
            'team_description' => $team_description,
            'reviews_image' => $reviews_image
        ];


        $employerLogos = EmployerLogo::all();

        $projects = ShowCaseProject::all();

        $staffs = Employee::all()->random(4);

        $services = Service::all()->random(6);

        $reviews = Review::all();


        $posts = Post::all();


        return view('frontend.home', compact('sharedData', 'services', 'posts', 'reviews', 'staffs', 'projects', 'employerLogos'));
    }

    public function services()
    {
        $services = Service::all();

        return view('frontend.services.services', compact('services'));
    }

    public function servicesPricing()
    {

        $prices = ServicePrice::all();

        return view('frontend.services.pricing', compact('prices'));
    }

    public function projects()
    {

        $categories = Service::all();

        $projects = ShowCaseProject::all();


        return view('frontend.projects.projectslist', compact('categories', 'projects'));
    }

    public function Singleproject($id)
    {


        $project = ShowCaseProject::find($id);
        $photos = ProjectPhoto::where('project_id', $id)->get();

        return view('frontend.projects.project_single', compact('project', 'photos'));
    }

    public function categoryProjetcs($id)
    {

        $categories = Service::all();
        $projects = ShowCaseProject::where('category_id', $id)->get();

        return view('frontend.projects.projectslist', compact('categories', 'projects'));

    }


    public function blog()
    {
        $posts = Post::paginate(4);

        $categories = PostCategory::all();

        return view('frontend.blog.posts', compact('posts','categories'));
    }


    public function categoryBlog($id){
        $posts = Post::where('category_id',$id)->paginate(4);
        $categories = PostCategory::all();

        return view('frontend.blog.posts', compact('posts','categories'));
    }

    public function Singleblog($id)
    {
        $post = Post::find($id);
        $cat_id = $post->category_id;

        $posts = Post::where('category_id',$cat_id)->get();

        $categories = PostCategory::all();

        return view('frontend.blog.singlepost', compact('post','categories','posts'));
    }

    public function careers()
    {
        $careers = Career::all();


        return view('frontend.careers.careers', compact('careers'));
    }

    public function careersApplication($id)
    {

        $career = Career::find($id);

        return view('frontend.careers.applyCareer', compact('career'));
    }

    public function careersApplicationStore(Request $request, $id, $user_id)
    {

        $this->validate($request, [
            'bio' => 'required',
            'resume' => 'required|mimes:pdf,doc,docx|max:20000'
        ]);


        if (CareerApplication::where('user_id', Auth::user()->id)->where('job_id', $id)->count() > 0) {

            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        $application = new CareerApplication();

        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');

            $extension = $resume->getClientOriginalExtension();

            $resume_name = 'resume' . '_' . '_' . date('Y-m-d_H-i-s') . '.' . $extension;

            $path = $resume->storeAs('public/resume', $resume_name);

            $application->resume = $path;
            $application->description = $request->bio;
            $application->job_id = $id;
            $application->user_id = $user_id;
            $application->status = 0;
            $application->save();
        }


        return redirect()->back()->with('success', 'application sent successfully we will get back to you');

    }

    public function aboutus()
    {
        $settings = PageSetting::all();

        foreach ($settings as $key => $setting) {
            if ($key == 4) $company_img = $setting->value;
            elseif ($key == 5) $company_description = $setting->value;
            elseif ($key == 6) $company_mission = $setting->value;
            elseif ($key == 7) $company_vision = $setting->value;
        }

        $companyData = [
            'company_img' => $company_img,
            'company_description' => $company_description,
            'company_mission' => $company_mission,
            'company_vision' => $company_vision,
        ];

        $team = Employee::all();
        $reviews = Review::all();

        return view('frontend.otherpages.aboutus',compact('companyData','team','reviews'));
    }

    public function contactus()
    {
        $contactus = ContactUsSettings::find(1)->first();


        return view('frontend.otherpages.contactus', compact('contactus'));
    }

    public function account()
    {
        $reviews = Review::where('user_id', Auth::user()->id)->latest()->get();
        $proposals = ProjectProposal::where('user_id', Auth::user()->id)->latest()->get();
        $projects = Project::all();
        return view('frontend.useraccount', compact('reviews', 'proposals', 'projects'));
    }


    public function devprofile($id)
    {
        $employee = Employee::find($id);
        return view('frontend.developers.developer', compact('employee'));
    }


    public function faq()
    {

        $faqs = Faq::all();

        return view('frontend.otherpages.faq', compact('faqs'));
    }

    public function termsConditions()
    {

        $terms = Term::all();

        return view('frontend.otherpages.termsandConditions', compact('terms'));
    }


    public function riskManagement()
    {
        return view('frontend.otherpages.riskmanagement');
    }

    public function downloads()
    {
        return view('frontend.otherpages.downloads');
    }

}
