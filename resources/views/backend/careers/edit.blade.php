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
                            <h1>Career Update</h1>
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
                                <h4 class="card-title">{{$career->title}} Career Update</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{route('career.update',$career->id)}}" method="POST">
                                        @csrf
                                       <div class="row">
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>Title</label>
                                                   <input type="text" name="title" class="form-control"
                                                          placeholder="Enter title" value="{{$career->title}}">
                                                   @if($errors->has('title'))
                                                       <div class="invalid-feedback d-block">{{$errors->first('title')}}</div>
                                                   @endif
                                               </div>

                                               <div class="form-group">
                                                   <label>Work Status</label>
                                                   <input type="text" name="work_status" class="form-control"
                                                          placeholder="Position" value="{{$career->work_status}}">
                                                   @if($errors->has('work_status'))
                                                       <div
                                                           class="invalid-feedback d-block">{{$errors->first('work_status')}}</div>
                                                   @endif
                                               </div>

                                               <div class="form-group">
                                                   <label>Qualifications</label>
                                                   <input type="text" name="qualifications" class="form-control"
                                                          placeholder="qualifications" value="{{$career->qualifications}}">
                                                   @if($errors->has('qualifications'))
                                                       <div
                                                           class="invalid-feedback d-block">{{$errors->first('qualifications')}}</div>
                                                   @endif
                                               </div>

                                               <div class="form-group">
                                                   <label>Experience</label>
                                                   <input type="text" name="experience" class="form-control"
                                                          placeholder="experience" value="{{$career->experience}}">
                                                   @if($errors->has('experience'))
                                                       <div
                                                           class="invalid-feedback d-block">{{$errors->first('experience')}}</div>
                                                   @endif
                                               </div>

                                           </div>
                                           <div class="col-md-6">
                                               <div class="form-group">
                                                   <label>Location</label>
                                                   <input type="text" name="location" class="form-control"
                                                          placeholder="location" value="{{$career->location}}">
                                                   @if($errors->has('location'))
                                                       <div
                                                           class="invalid-feedback d-block">{{$errors->first('location')}}</div>
                                                   @endif
                                               </div>

                                               <div class="form-group">
                                                   <label class="mb-1">Deadline</label>
                                                   <div class='input-group date' id='datepicker-action'>
                                                       <input class="form-control" type='text' name="deadline" value="{{$career->deadline}}"/>
                                                       <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                        </span>
                                                   </div>
                                                   @if($errors->has('deadline'))
                                                       <div class="text-danger">
                                                           {{$errors->first('deadline')}}
                                                       </div>
                                                   @endif
                                               </div>


                                               <div class="form-group">
                                                   <label>Salary</label>
                                                   <input type="text" class="form-control" name="salary"
                                                          placeholder="Enter salary" value="{{$career->salary}}">
                                                   @if($errors->has('salary'))
                                                       <div class="invalid-feedback d-block">{{$errors->first('salary')}}</div>
                                                   @endif
                                               </div>
                                           </div>
                                       </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" name="description" rows="4" placeholder="Description">
                                                {{$career->description}}
                                            </textarea>
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
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
