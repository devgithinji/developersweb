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
                                        Tables
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Data Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>{{$page_name}}</h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('staff.profiles')}}" class="btn btn-primary float-right ml-3">Staff Profiles</a>
                                    <a href="{{route('staff.create')}}" class="btn btn-primary float-right">create new</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Position</th>
                                    <th>Contacts</th>
                                    <th>Projects</th>
                                    <th>Member Since</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($employees as $row=>$employee)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">{{ucwords($employee->name)}}</td>
                                        <td class="text-center">
                                            @if($employee->profile->avatar_small == null)
                                                <img src="{{asset('staffavatar/avatar_small.png')}}" class="img-thumbnail" alt="">
                                            @else
                                                <img src="{{asset('staffavatar/'.$employee->profile->avatar_small)}}" class="img-thumbnail" alt="">
                                            @endif
                                        </td>
                                        <td class="text-center">{{ucwords($employee->profile->position)}}</td>
                                        <td class="text-center">
                                            <span class="text-muted"> Email:</span> {{$employee->email}}
                                            <br>
                                            <span
                                                class="text-muted"> Mobile:</span> {{$employee->profile->phone_number}}
                                        </td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-badge btn-primary">
                                                tasks
                                                <span class="badge badge-light"> {{$employee->task->count()}} </span>
                                            </a>
                                        </td>
                                        <td class="text-center">{{date('F d, Y',strtotime($employee->created_at))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('staff.profile.view',$employee->id)}}"
                                               class="btn btn-icon btn-outline-success btn-round mr-2 mb-2 mb-sm-0"
                                               type="button"><i class="ti ti-eye"></i></a>
                                            <a href="{{route('staff.profile.edit',$employee->id)}}"
                                               class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0"
                                               type="button"><i class="ti ti-pencil"></i></a>
                                            <a href="{{route('staff.profile.dismiss',$employee->id)}}"
                                               class="btn btn-icon btn-outline-danger btn-round" type="button"><i
                                                    class="ti ti-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
