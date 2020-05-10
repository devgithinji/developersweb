@extends('backend.master')
@section('content')
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>Account Settings</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Pages
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Account
                                        Settings
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->

            <!--mail-Compose-contant-start-->
            <div class="row account-contant">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                    <div class="page-account-profil pt-5">
                                        <div class="profile-img text-center rounded-circle">
                                            <div class="pt-5">
                                                <div class="bg-img m-auto">
                                                    <img src="{{asset('staffavatar/'.$profile->avatar_small)}}"
                                                         class="img-fluid"
                                                         alt="users-avatar">
                                                </div>
                                                <div class="profile pt-4">
                                                    <h4 class="mb-1">{{ucwords($profile->user->name)}}</h4>
                                                    <p>{{ucwords($profile->title)}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="py-5 profile-counter">
                                            <ul class="nav justify-content-center text-center">
                                                <li class="nav-item border-right px-3">
                                                    <div>
                                                        <h4 class="mb-0">90</h4>
                                                        <p>Projects</p>
                                                    </div>
                                                </li>

                                                <li class="nav-item border-right px-3">
                                                    <div>
                                                        <h4 class="mb-0">1.5K</h4>
                                                        <p>Messages</p>
                                                    </div>
                                                </li>

                                                <li class="nav-item px-3">
                                                    <div>
                                                        <h4 class="mb-0">4.4K</h4>
                                                        <p>Members</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="text-center mt-4">
                                            <h4 class="text-primary">
                                                Resume
                                            </h4>
                                            @if($profile->resume)
                                                <ul class="nav justify-content-center text-center m-2">
                                                    <li class="nav-item px-6">
                                                        <div>
                                                            <a href="{{Storage::url($profile->resume)}}"
                                                               class="text-primary p-2">download</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">Personal Details</h5>
                                        </div>
                                        <div class="p-4">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="name1">Full Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{$profile->user->name}}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="title1">Title</label>
                                                    <input type="text" class="form-control" name="title"
                                                           value="{{$profile->title}}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="phone1">Phone Number</label>
                                                    <input type="text" class="form-control" name="phone_number"
                                                           value="{{$profile->phone_number}}" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="email1">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{$profile->user->email}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="add1">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                       value="{{$profile->address}}" readonly>
                                            </div>


                                            <div class="form-group">
                                                <label class="mb-1">Birthday</label>
                                                    <input class="form-control" type='text' name="birthday"
                                                           value="{{$profile->birthday}}" readonly/>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" name="country"
                                                           value="{{$profile->country}}" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>City/Town</label>
                                                    <input type="text" class="form-control" name="city_town"
                                                           value="{{$profile->city_town}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 border-t col-12">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">External Links</h5>
                                        </div>
                                        <div class="p-4">
                                            <div class="form-group">
                                                <label for="fb">Facebook URL:</label>
                                                <input type="text" class="form-control" name="facebook_account"
                                                       value="{{$profile->facebook_account}}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="tr">Twitter URL:</label>
                                                <input type="text" class="form-control" name="twitter_account"
                                                       value="{{$profile->twitter_account}}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="li">LinkedIn URL:</label>
                                                <input type="text" class="form-control" name="linkedin_account"
                                                       value="{{$profile->linkedin_account}}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="we">Website URL:</label>
                                                <input type="text" class="form-control" name="website_url"
                                                       value="{{$profile->website_url}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--mail-Compose-contant-end-->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
