<?php

namespace App\Http\Controllers\Admin;

use App\ContactUsSettings;
use App\Http\Controllers\Controller;
use App\PageSetting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GeneralSettingsController extends Controller
{
    /**
     * GeneralSettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }


    public function index()
    {
        $settings = PageSetting::all();

        return view('backend.page.listdefaultsettings', compact('settings'));
    }

    public function create()
    {

        $settings = PageSetting::all();

        return view('backend.page.createdefaultsettings', compact('settings'));
    }


    public function logostore(Request $request)
    {

        $logo = PageSetting::where('section_id', 1)->count();

        if ($logo > 0) {
            $this->validate($request, [
                'logo' => 'mimes:jpeg,jpg,png,gif|required'
            ]);

            $logo_id = PageSetting::where('section_id', 1)->get()->pluck('id');


            $setting = PageSetting::where('id', $logo_id)->first();


            @unlink(public_path('frontendImages/' . $setting->value));


            if ($request->hasFile('logo')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $logo = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


                Image::make($file)->resize(300, 100)->save(public_path('frontendImages/' . $logo));

                $setting->name = 'logo';
                $setting->value = $logo;

            }

            $setting->section_id = 1;

            $setting->save();


            $notification = array(
                'message' => 'Logo updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);


        } else {

            $this->validate($request, [
                'logo' => 'mimes:jpeg,jpg,png,gif|required'
            ]);


            $setting = new PageSetting();

            if ($request->hasFile('logo')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('logo');
                $extension = $file->getClientOriginalExtension();
                $logo = 'small_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


                Image::make($file)->resize(700, 570)->save(public_path('frontendImages/' . $logo));

                $setting->name = 'logo';
                $setting->value = $logo;

            }

            $setting->section_id = 1;

            $setting->save();


            $notification = array(
                'message' => 'Logo saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);

        }

    }


    public function herostore(Request $request)
    {

        $hero = PageSetting::where('section_id', 2)->count();

        if ($hero > 0) {
            $this->validate($request, [
                'hero' => 'nullable|mimes:jpeg,jpg,png,gif',
                'title' => 'nullable|string',
                'description' => 'nullable|string'
            ]);


            if ($request->hasFile('hero')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('hero');
                $extension = $file->getClientOriginalExtension();
                $hero = 'hero_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;

                $setting = PageSetting::where('section_id', 2)->where('name', 'image')->first();

                @unlink(public_path('frontendImages/' . $setting->value));

                Image::make($file)->resize(1920, 766)->save(public_path('frontendImages/' . $hero));

                $setting->value = $hero;

                $setting->save();


            }

            if ($request->input('title')) {
                $setting = PageSetting::where('section_id', 2)->where('name', 'title')->first();
                $setting->value = $request->title;
                $setting->save();
            }

            if ($request->input('description')) {
                $setting = PageSetting::where('section_id', 2)->where('name', 'description')->first();
                $setting->value = $request->description;
                $setting->save();
            }


            $notification = array(
                'message' => 'Hero details updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);


        } else {
            $this->validate($request, [
                'hero' => 'mimes:jpeg,jpg,png,gif|required',
                'title' => 'string|required',
                'description' => 'string|required'
            ]);

            $setting = new PageSetting();

            if ($request->hasFile('hero')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('hero');
                $extension = $file->getClientOriginalExtension();
                $hero = 'hero_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


                Image::make($file)->resize(1920, 766)->save(public_path('frontendImages/' . $hero));

                $setting->name = 'image';
                $setting->value = $hero;

            }

            $setting->section_id = 2;

            $setting->save();

            $setting = new PageSetting();
            $setting->section_id = 2;
            $setting->name = 'title';
            $setting->value = $request->title;
            $setting->save();

            $setting = new PageSetting();
            $setting->section_id = 2;
            $setting->name = 'description';
            $setting->value = $request->description;
            $setting->save();


            $notification = array(
                'message' => 'Hero details saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }


    }

    public function companystore(Request $request)
    {

        $company = PageSetting::where('section_id', 3)->count();

        if ($company > 0) {
            $this->validate($request, [
                'image' => 'nullable|mimes:jpeg,jpg,png,gif',
                'mission' => 'nullable|string',
                'vision' => 'nullable|string',
                'description' => 'nullable|string'
            ]);

            if ($request->hasFile('image')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'company_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;

                $setting = PageSetting::where('section_id', 3)->where('name', 'image')->first();

                @unlink(public_path('frontendImages/' . $setting->value));

                Image::make($file)->resize(1400, 2000)->save(public_path('frontendImages/' . $image));

                $setting->value = $image;
                $setting->save();

            }

            if ($request->input('description')) {
                $setting = PageSetting::where('section_id', 3)->where('name', 'description')->first();
                $setting->value = $request->description;
                $setting->save();
            }

            if ($request->input('mission')) {
                $setting = PageSetting::where('section_id', 3)->where('name', 'mission')->first();
                $setting->value = $request->mission;
                $setting->save();
            }

            if ($request->input('vision')) {
                $setting = PageSetting::where('section_id', 3)->where('name', 'vision')->first();
                $setting->value = $request->vision;
                $setting->save();
            }

            $notification = array(
                'message' => 'Company details updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);

        } else {
            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png,gif|required',
                'mission' => 'string|required',
                'vision' => 'string|required',
                'description' => 'string|required'
            ]);

            $setting = new PageSetting();

            if ($request->hasFile('image')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'company_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


                Image::make($file)->resize(1400, 2000)->save(public_path('frontendImages/' . $image));

                $setting->name = 'image';
                $setting->value = $image;

            }

            $setting->section_id = 3;
            $setting->save();

            $setting = new PageSetting();
            $setting->section_id = 3;
            $setting->name = 'description';
            $setting->value = $request->description;
            $setting->save();

            $setting = new PageSetting();
            $setting->section_id = 3;
            $setting->name = 'mission';
            $setting->value = $request->mission;
            $setting->save();

            $setting = new PageSetting();
            $setting->section_id = 3;
            $setting->name = 'vision';
            $setting->value = $request->vision;
            $setting->save();


            $notification = array(
                'message' => 'Company details saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }


    }


    public function projectsstore(Request $request)
    {
        $project = PageSetting::where('section_id', 4)->count();

        if ($project > 0) {
            $this->validate($request, [
                'description' => 'nullable|string'
            ]);

            $setting = PageSetting::where('section_id', 4)->where('name', 'description')->first();
            $setting->value = $request->description;
            $setting->save();

            $notification = array(
                'message' => 'Our Projects details updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);

        } else {
            $this->validate($request, [
                'description' => 'string|required'
            ]);

            $setting = new PageSetting();

            $setting->section_id = 4;
            $setting->name = 'description';
            $setting->value = $request->description;
            $setting->save();


            $notification = array(
                'message' => 'Our Projects details saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }

    }

    public function servicesstore(Request $request)
    {

        $service = PageSetting::where('section_id', 5)->count();

        if ($service > 0) {

            validate($request, [
                'description' => 'nullable|string'
            ]);

            $setting = PageSetting::where('section_id', 5)->where('name', 'description')->first();
            $setting->value = $request->description;
            $setting->save();

            $notification = array(
                'message' => 'Services details updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        } else {

            $this->validate($request, [
                'description' => 'string|required'
            ]);

            $setting = new PageSetting();

            $setting->section_id = 5;
            $setting->name = 'description';
            $setting->value = $request->description;
            $setting->save();


            $notification = array(
                'message' => 'Services details saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }

    }

    public function teamsstore(Request $request)
    {

        $teams = PageSetting::where('section_id', 6)->count();

        if ($teams > 0) {

            $this->validate($request, [
                'description' => 'nullable|string'
            ]);

            $setting = PageSetting::where('section_id', 6)->where('name', 'description')->first();
            $setting->value = $request->description;
            $setting->save();

            $notification = array(
                'message' => 'Team details updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);

        } else {
            $this->validate($request, [
                'description' => 'string|required'
            ]);

            $setting = new PageSetting();

            $setting->section_id = 6;
            $setting->name = 'description';
            $setting->value = $request->description;
            $setting->save();


            $notification = array(
                'message' => 'Team details saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }

    }

    public function reviewsstore(Request $request)
    {

        $reviews = PageSetting::where('section_id', 7)->count();

        if ($reviews > 0) {
            $this->validate($request, [
                'image' => 'nullable|mimes:jpeg,jpg,png,gif|required'
            ]);

            if ($request->hasFile('image')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'review_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;

                $setting = PageSetting::where('section_id', 7)->where('name', 'image')->first();

                @unlink(public_path('frontendImages/' . $setting->value));

                Image::make($file)->resize(2000, 1200)->save(public_path('frontendImages/' . $image));

                $setting->value = $image;
                $setting->save();

                $notification = array(
                    'message' => 'Review section Background image updated successfully',
                    'alert-type' => 'success'
                );

                return redirect()->to(route('general.settings.list'))->with($notification);

            }

        } else {
            $this->validate($request, [
                'image' => 'mimes:jpeg,jpg,png,gif|required'
            ]);

            $setting = new PageSetting();

            if ($request->hasFile('image')) {
                $random_no = rand(9999, 9999999);
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $image = 'review_image' . date('H-i-s') . '_' . $random_no . '.' . $extension;


                Image::make($file)->resize(2000, 1200)->save(public_path('frontendImages/' . $image));

                $setting->name = 'image';
                $setting->value = $image;

            }

            $setting->section_id = 7;

            $setting->save();


            $notification = array(
                'message' => 'Review section Background image saved successfully',
                'alert-type' => 'success'
            );

            return redirect()->to(route('general.settings.list'))->with($notification);
        }
    }


    public function ContactUsCreate()
    {
        $contactus = ContactUsSettings::find(1);

        if (!$contactus == null){
            return view('backend.page.contactus',compact('contactus'));
        }

        return view('backend.page.contactus');
    }

    public function ContactUsStore(Request $request)
    {

        $this->validate($request,[
            'phoneone' => 'required',
            'phonetwo' => 'required',
            'phonethree' => 'required',
            'emailone' => 'required',
            'emailtwo' => 'required',
            'emailthree' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'address' => 'required',
        ]);

        $contactus = ContactUsSettings::find(1);

        if ($contactus == null) {
            ContactUsSettings::create([
                'phoneone' => $request->phoneone,
                'phonetwo' => $request->phonetwo,
                'phonethree' => $request->phonethree,
                'emailone' => $request->emailone,
                'emailtwo' => $request->emailtwo,
                'emailthree' => $request->emailthree,
                'facebookLink' => $request->facebook,
                'twitterLink' => $request->twitter,
                'linkedInLink' => $request->linkedin,
                'address' => $request->address,
            ]);
        } else {
            $contactus->update([
                'phoneone' => $request->phoneone,
                'phonetwo' => $request->phonetwo,
                'phonethree' => $request->phonethree,
                'emailone' => $request->emailone,
                'emailtwo' => $request->emailtwo,
                'emailthree' => $request->emailthree,
                'facebookLink' => $request->facebook,
                'twitterLink' => $request->twitter,
                'linkedInLink' => $request->linkedin,
                'address' => $request->address,
            ]);
        }

        $notification = array(
            'message' => 'Setting Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
