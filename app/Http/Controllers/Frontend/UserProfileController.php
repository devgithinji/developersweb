<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{


    /**
     * UserProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function profileEdit()
    {

        $user = Auth::user();

        if (!UserProfile::where('user_id', $user->id)->count() > 0) {

            $profile = new UserProfile();
            $profile->user_id = $user->id;
            $profile->save();
        }

        $profile = UserProfile::where('user_id', $user->id)->first();

        return view('frontend.user.profile_edit', compact('user', 'profile'));

    }

    public function profileUpdate(Request $request)
    {

        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
            'phone' => 'required|numeric',
            'address' => 'required',
            'occupation' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $profile = UserProfile::where('user_id',Auth::user()->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;



        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->occupation = $request->occupation;

        if ($request->hasFile('image')) {
            $random_no = rand(9999, 9999999);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $avatar = 'avatar' . date('H-i-s') . '_' . $random_no . '.' . $extension;


           if ($profile->avatar){
               unlink(public_path('userAvatars/' . $profile->avatar));
           }

            Image::make($file)->resize(90, 90)->save(public_path('userAvatars/' . $avatar));

            $profile->avatar = $avatar;

        }
        $profile->save();
        $user->save();

        return redirect()->to(route('account'))->with('success','Profile updated successfully');

    }
}
