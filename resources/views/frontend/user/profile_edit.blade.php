@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Profile Edit</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Profile Edit</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Profile Edit</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                    <div class="section-content">
                        <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                               value="{{$user->name}}">
                                        @if($errors->has('name'))
                                            <p class="invalid-feedback d-block">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                               value="{{$user->email}}">
                                        @if($errors->has('email'))
                                            <p class="invalid-feedback d-block">{{$errors->first('email')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{$profile->phone}}">
                                        @if($errors->has('phone'))
                                            <p class="invalid-feedback d-block">{{$errors->first('phone')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Occupation</label>
                                        <input type="text" name="occupation" class="form-control"
                                               placeholder="Enter Occupation" value="{{$profile->occupation}}">
                                        @if($errors->has('occupation'))
                                            <p class="invalid-feedback d-block">{{$errors->first('occupation')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Enter Address" value="{{$profile->address}}">
                                        @if($errors->has('address'))
                                            <p class="invalid-feedback d-block">{{$errors->first('address')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>User Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="product_img">
                                            <label class="custom-file-label" id="product_img_label" for="">Choose
                                                profile Image</label>
                                        </div>
                                        @if($errors->has('image'))
                                            <div
                                                class="error invalid-feedback d-block">{{$errors->first('image')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="site-button outline blue m-r15" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Left & right section  END -->
        </div>
    </div>
    <script>
        window.onload = function () {
            $('#product_img').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#product_img_label').html(fileName);
            });
        }
    </script>
@endsection
