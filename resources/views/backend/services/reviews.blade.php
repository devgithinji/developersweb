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
                            <h1>Reviews</h1>
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
                                <h3 class="ml-3">Reviews List</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reviews as $row=>$review)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">{{ucwords($review->user->name)}}</td>

                                        <td class="text-center">{{Str::limit($review->review,50)}}</td>

                                        <td class="text-center">
                                            @if($review->status == 0)
                                                <a type="button" href="{{route('review.status.update',[$review->id,1])}}" class="badge badge-danger-inverse">Inactive</a>
                                            @else
                                                <a type="button" href="{{route('review.status.update',[$review->id,0])}}" class="badge badge-success-inverse">Active</a>
                                            @endif
                                        </td>

                                        <td class="text-center">{{date('F d, Y',strtotime($review->created_at))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('review.view',$review->id)}}" class="btn btn-round btn-inverse-success" type="button">View</a>
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
