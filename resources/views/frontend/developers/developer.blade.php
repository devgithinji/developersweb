@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Developer Profile</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Developer Profile</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white">
            <!-- Services -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4"><img src="{{asset('staffavatar/'.$employee->profile->avatar_medium)}}" alt=""/></div>
                    <div class="col-md-8 col-lg-8">
                        <h2 class="text-uppercase">Developer Profile</h2>
                       <h5>Name</h5>
                        <p>{{ucwords($employee->name)}}</p>
                        <h5>Description</h5>
                        <p>{{$employee->profile->description}}</p>
                        <h5>Position</h5>
                        <p>{{$employee->profile->position}}</p>
                        <h5>Birthday</h5>
                        <p>{{date('F j,Y',strtotime($employee->profile->birthday))}}</p>
                        <h5>Skills</h5>
                        <p>{{$employee->profile->skills}} <br> <a href="{{Storage::url($employee->profile->resume)}}" class="text-primary">Resume download</a></p>
                        <h5>Contacts</h5>
                        <p><i class="fa fa-phone text-primary"></i> {{$employee->profile->phone_number}}   <i class="fa fa-comment text-primary"></i>  {{$employee->email}}</p>
                        <h5>Social Media</h5>
                        <a class="site-button outline blue m-r15" href="{{$employee->profile->facebook_account}}" title="facebook" type="button"><i class="fa fa-facebook"></i></a>
                        <a class="site-button outline blue m-r15" href="{{$employee->profile->twitter_account}}" title="twitter" type="button"><i class="fa fa-twitter"></i></a>
                        <a class="site-button outline blue m-r15" href="{{$employee->profile->linkedin_account}}" title="linked In" type="button"><i class="fa fa-linkedin"></i></a>
                        <a class="site-button outline blue m-r15" href="{{$employee->profile->website_url}}" title="github" type="button"><i class="fa fa-github"></i></a>
                    </div>
                </div>
            </div>
            <!-- Services END -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
