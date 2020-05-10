<?php

namespace App\Providers;


use App\ContactUsSettings;
use App\Mail\AccountVerification;
use App\PageImages;
use App\PageSetting;
use App\Post;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        VerifyEmail::toMailUsing(function ($notifiable){
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire',60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );

            $user = User::where('email',$notifiable->getEmailForVerification())->first();

            return (new MailMessage())->subject('Account Verification')
                ->markdown('emails.email_verification',['url'=> $verifyUrl,'name' => $user->name]);
        });
/*
        $mission = PageSetting::find(7);
        $servicesList = Service::all();
        $postsList = Post::latest()->limit(3)->get();
        $maincontactus = ContactUsSettings::find(1);

        $logoMain = PageSetting::find(1);

        $pageImages = PageImages::all();

        $pageImagesList = $pageImages->pluck('large_image')->toArray();



        view()->share(['logoMain'=> $logoMain,'mission' => $mission,'servicesList'=> $servicesList,'postsList'=>$postsList,'maincontactus'=>$maincontactus,'pageImagesList'=>$pageImagesList]);*/

    }
}
