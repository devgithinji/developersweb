@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Project Proposal Create</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Proposal Create</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Project Proposal Create</h2>
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
                        <form action="{{route('proposal.store')}}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                        @if($errors->has('name'))
                                            <p class="invalid-feedback d-block">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea type="text" name="description" class="form-control" rows="5" placeholder="Write Project description"></textarea>
                                        @if($errors->has('description'))
                                            <p class="invalid-feedback d-block">{{$errors->first('description')}}</p>
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
            $('#product_img').change(function (e) {
                var fileName = e.target.files[0].name;
                $('#product_img_label').html(fileName);
            });
        }
    </script>
@endsection
