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
                                                    @if($profile->avatar_small == null)
                                                        <img src="{{asset('staffavatar/avatar_small.png')}}" class="img-fluid" alt="users-avatar">
                                                    @else
                                                        <img src="{{asset('staffavatar/'.$profile->avatar_small)}}" class="img-fluid" alt="users-avatar">
                                                     @endif
                                                </div>
                                                <div class="profile pt-4">
                                                    <h4 class="mb-1">{{ucwords($profile->user->name)}}</h4>
                                                    <p>{{ucwords($profile->title)}}</p>
                                                    <p>{{ucwords($profile->position)}}</p>
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

                                        <div class="profile-btn text-center">
                                            <div>
                                                <button class="btn btn-light text-primary mb-2" id="avatar_upload">
                                                    Upload New Avatar
                                                </button>
                                            </div>
                                            <div>
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
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
                                            <div>
                                                <button class="btn btn-light text-primary m-2" id="resumeadd">Upload New
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                        </div>
                                        <div class="p-4">
                                            <form action="{{route('staff.avatar.personalsettings',[Auth::user()->id])}}"
                                                  method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name1">Full Name</label>
                                                    <input type="text" class="form-control" name="name"
                                                           value="{{Auth::user()->name}}">
                                                    @if($errors->has('name'))
                                                        <div class="text-danger">
                                                            {{$errors->first('name')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="phone1">Phone Number</label>
                                                        <input type="text" class="form-control" name="phone_number"
                                                               value="{{$profile->phone_number}}">
                                                        @if($errors->has('phone_number'))
                                                            <div class="text-danger">
                                                                {{$errors->first('phone_number')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="email1">Email</label>
                                                        <input type="email" class="form-control" name="email"
                                                               value="{{Auth::user()->email}}">
                                                        @if($errors->has('email'))
                                                            <div class="text-danger">
                                                                {{$errors->first('email')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="title1">Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{$profile->title}}">
                                                        @if($errors->has('title'))
                                                            <div class="text-danger">
                                                                {{$errors->first('title')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="title1">Position</label>
                                                        <input type="text" class="form-control" name="position" value="{{$profile->position}}">
                                                        @if($errors->has('position'))
                                                            <div class="text-danger">
                                                                {{$errors->first('position')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="add1">Skills</label>
                                                    <input type="text" class="form-control" name="skills" value="{{$profile->skills}}">
                                                    @if($errors->has('skills'))
                                                        <div class="text-danger">
                                                            {{$errors->first('skills')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="add1">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                           value="{{$profile->address}}">
                                                    @if($errors->has('address'))
                                                        <div class="text-danger">
                                                            {{$errors->first('address')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Birthday</label>
                                                    <div class='input-group date' id='datepicker-action'>
                                                        <input class="form-control" type='text' name="birthday"
                                                               value="{{$profile->birthday}}"/>
                                                        <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                    @if($errors->has('birthday'))
                                                        <div class="text-danger">
                                                            {{$errors->first('birthday')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label>Country</label>
                                                        <input type="text" class="form-control" name="country"
                                                               value="{{$profile->country}}">
                                                        @if($errors->has('country'))
                                                            <div class="text-danger">
                                                                {{$errors->first('country')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>City/Town</label>
                                                        <input type="text" class="form-control" name="city_town"
                                                               value="{{$profile->city_town}}">
                                                        @if($errors->has('city_town'))
                                                            <div class="text-danger">
                                                                {{$errors->first('city_town')}}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Information
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6 border-t col-12">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">Your External Link</h5>
                                        </div>
                                        <div class="p-4">
                                            <form action="{{route('staff.avatar.personalLinks',[Auth::user()->id])}}"
                                                  method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="fb">Facebook URL:</label>
                                                    <input type="text" class="form-control" name="facebook_account"
                                                           value="{{$profile->facebook_account}}">
                                                    @if($errors->has('facebook_account'))
                                                        <div class="text-danger">
                                                            {{$errors->first('facebook_account')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="tr">Twitter URL:</label>
                                                    <input type="text" class="form-control" name="twitter_account"
                                                           value="{{$profile->twitter_account}}">
                                                    @if($errors->has('twitter_account'))
                                                        <div class="text-danger">
                                                            {{$errors->first('twitter_account')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="li">LinkedIn URL:</label>
                                                    <input type="text" class="form-control" name="linkedin_account"
                                                           value="{{$profile->linkedin_account}}">
                                                    @if($errors->has('linkedin_account'))
                                                        <div class="text-danger">
                                                            {{$errors->first('linkedin_account')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="we">Website URL:</label>
                                                    <input type="text" class="form-control" name="website_url"
                                                           value="{{$profile->website_url}}">
                                                    @if($errors->has('website_url'))
                                                        <div class="text-danger">
                                                            {{$errors->first('website_url')}}
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="we">Description</label>
                                                    <textarea type="text" class="form-control" name="description" rows="4">
                                                    {{$profile->description}}
                                                    </textarea>
                                                    @if($errors->has('website_url'))
                                                        <div class="text-danger">
                                                            {{$errors->first('website_url')}}
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save & Update</button>
                                            </form>
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
    <!-- Modal -->
    <div class="modal fade" id="profileupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('staff.avatar.upload',[Auth::user()->id])}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Choose Profile Picture</h5>
                        <button type="button" class="close close_modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center m-3">
                            <img src="#" id="imgPreview" class="img-thumbnail" alt="" width="100%">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="avatar" id="avatar">
                                <label class="custom-file-label" id="avatar_label" for="">Choose avatar</label>
                            </div>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="resumeupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('staff.resume.upload',[Auth::user()->id])}}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Choose Resume</h5>
                        <button type="button" class="close close_resume_modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="resume" id="resume">
                                <label class="custom-file-label" id="resume_label" for="">Choose Resume</label>
                            </div>
                            @if($errors->has('avatar'))
                                <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_resume_modal">Close</button>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            $('#avatar').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#avatar_label').html(fileName);
            });
            $('#avatar_upload').on('click', function () {
                $('#profileupload').modal('show');
            });
            $('.close_modal').on('click', function () {
                $('#imgPreview').hide();
                $('#avatar_label').html('');
                $('#profileupload').modal('hide');
            });
            $('#avatar').change(function () {
                renderPreviewImg(this);
            });

            $('#imgPreview').hide();

            function renderPreviewImg(input) {
                $('#imgPreview').show();

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#imgPreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#resumeadd').on('click', function () {
                $('#resumeupload').modal('show');
            })

            $('.close_resume_modal').on('click', function () {
                $('#resume_label').html('');
                $('#resumeupload').modal('hide');
            });

            $('#resume').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#resume_label').html(fileName);
            });
        }
    </script>
@endsection
