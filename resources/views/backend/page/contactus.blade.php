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
                            <h1>Contact Us</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Forms
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Form Layouts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row justify-content-center">
                <div class="col-md-12 mt-3">
                    <div class="card card-statistics p-3">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Contact Us Settings</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <form action="{{route('contactus.settings.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div>
                                                        <h4>Emails</h4>
                                                        <div class="form-group">
                                                            <label>General Email</label>
                                                            <input type="text" class="form-control" name="emailone" placeholder="General Email" value="{{$contactus->emailone ?? ''}}">
                                                            @if($errors->has('emailone'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('emailone')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Projects Email</label>
                                                            <input type="text" class="form-control" name="emailtwo" placeholder="Projects Email" value="{{$contactus->emailtwo ?? ''}}">
                                                            @if($errors->has('emailtwo'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('emailtwo')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ecommerce Email</label>
                                                            <input type="text" class="form-control" name="emailthree" placeholder="Ecommerce Email" value="{{$contactus->emailthree ?? ''}}">
                                                            @if($errors->has('emailthree'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('emailthree')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h4>Phone Numbers</h4>
                                                        <div class="form-group">
                                                            <label>Main Phonenumber</label>
                                                            <input type="text" class="form-control" name="phoneone" placeholder="Phone One" value="{{$contactus->phoneone ?? ''}}">
                                                            @if($errors->has('phoneone'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('phoneone')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Project Manager Phonenumber</label>
                                                            <input type="text" class="form-control" name="phonetwo" placeholder="Phone Two" value="{{$contactus->phonetwo ?? ''}}">
                                                            @if($errors->has('phonetwo'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('phonetwo')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ecommerce PhoneNumber</label>
                                                            <input type="text" class="form-control" name="phonethree" placeholder="Phone Three" value="{{$contactus->phonethree ?? ''}}">
                                                            @if($errors->has('phonethree'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('phonethree')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div>
                                                        <h4>Social Media</h4>
                                                        <div class="form-group">
                                                            <label>FaceBook Link</label>
                                                            <input type="text" class="form-control" name="facebook" placeholder="FaceBook Link" value="{{$contactus->facebookLink ?? ''}}">
                                                            @if($errors->has('facebook'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('facebook')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Twitter Link</label>
                                                            <input type="text" class="form-control" name="twitter" placeholder="twitter" value="{{$contactus->twitterLink ?? ''}}">
                                                            @if($errors->has('twitter'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('twitter')}}</div>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label>LinkedIn Link</label>
                                                            <input type="text" class="form-control" name="linkedin" placeholder="LinkedIn Link" value="{{$contactus->linkedInLink ?? ''}}">
                                                            @if($errors->has('linkedin'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('linkedin')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <h4>Address</h4>
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="address" placeholder="Address" value="{{$contactus->address ?? ''}}">
                                                            @if($errors->has('address'))
                                                                <div class="error invalid-feedback d-block">{{$errors->first('address')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
