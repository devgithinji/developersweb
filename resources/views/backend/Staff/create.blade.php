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
                            <form action="{{route('staff.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Job Position</label>
                                    <input type="text" name="position" class="form-control" placeholder="Position">
                                    @if($errors->has('position'))
                                        <div class="invalid-feedback d-block">{{$errors->first('position')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios1"
                                               value="male" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gridRadios2"
                                               value="female">
                                        <label class="form-check-label" for="gridRadios2">
                                            Female
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control"  name="email" placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">Correct email address required.
                                    </small>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback d-block">{{$errors->first('email')}}</div>
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
