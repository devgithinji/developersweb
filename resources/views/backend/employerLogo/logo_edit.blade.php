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
                            <h1>Term Edit</h1>
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
                <div class="col-md-10 mt-3">
                    <div class="card card-statistics p-3">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Term Edit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('logo.update',$logo->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Employer Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$logo->name}}">
                                    @if($errors->has('logo'))
                                        <div class="invalid-feedback d-block">{{$errors->first('logo')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Employer Logo</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="product_img">
                                        <label class="custom-file-label" id="product_img_label" for="">Choose Employer Logo</label>
                                    </div>
                                    @if($errors->has('image'))
                                        <div class="error invalid-feedback d-block">{{$errors->first('image')}}</div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
