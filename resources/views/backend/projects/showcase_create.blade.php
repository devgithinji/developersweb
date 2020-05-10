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
                            <h1>{{$page_name}}</h1>
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
                                <h4 class="card-title">{{$page_name}}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('projects.showcase.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="Enter Project Link">
                                    @if($errors->has('link'))
                                        <div class="invalid-feedback d-block">{{$errors->first('link')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Project Type</label>
                                    <select class="js-basic-single form-control" name="service_name">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="5S" name="description"></textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback d-block">{{$errors->first('description')}}</div>
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
