@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Job Application</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Job Application</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Job Application</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                    <div class="section-content">
                        @if (Session::has('success'))
                            <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> {{session('success')}}</div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error!</strong> {{session('error')}}</div>
                        @endif
                        <h3>{{ucwords($career->title)}} Position</h3>
                        <form action="{{route('careers.application.store',[$career->id,Auth::user()->id])}}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Review</label>
                                        <textarea type="text" name="bio" class="form-control" rows="5"
                                                  placeholder="Write your Bio"></textarea>
                                        @if($errors->has('bio'))
                                            <div class="invalid-feedback d-block">{{$errors->first('bio')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="resume" id="resume">
                                            <label class="custom-file-label" id="resume_label" for="">Choose
                                                Resume</label>
                                        </div>
                                        @if($errors->has('resume'))
                                            <div class="invalid-feedback d-block">{{$errors->first('resume')}}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="site-button outline blue m-r15" type="submit">Submit</button>
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

            $('#resume').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#resume_label').html(fileName);
            });

        }
    </script>
@endsection
