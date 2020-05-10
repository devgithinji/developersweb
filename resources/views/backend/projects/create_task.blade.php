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
                            <h1>{{$milestone->project->name}}</h1>
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
                                <h4 class="card-title"><span class="text-primary">{{$milestone->name}}</span> Task Create</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('milestone.task.store',[$milestone->id])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Task Date Range</label>
                                    <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control range-from" name="start_date">
                                        <span class="input-group-addon">To</span>
                                        <input class="form-control range-to" type="text" name="finish_date">
                                    </div>
                                    @if($errors->has('start_date'))
                                        <div class="invalid-feedback d-block">{{$errors->first('start_date')}}</div>
                                    @endif
                                    @if($errors->has('finish_date'))
                                        <div class="invalid-feedback d-block">{{$errors->first('finish_date')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Developer</label>
                                    <select class="js-basic-single form-control" name="developer">
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description"></textarea>
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
