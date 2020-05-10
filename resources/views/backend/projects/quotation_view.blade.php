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
                            <h1>Quotations Details View</h1>
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
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Elements</li>
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
                <div class="col-md-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">
                                    proposal: {{$quotation->name}}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Client</h5>
                                    <p>{{$quotation->name}}</p>
                                    <h5>Service Type</h5>
                                    <p>{{$quotation->type->name}}</p>
                                    <h5>Contact</h5>
                                    <p>{{$quotation->contact}}</p>
                                    <h5>Description</h5>
                                    <p> {{$quotation->description}}</p>
                                    <h5>Status</h5>
                                    @if($quotation->status == 1)
                                        <p class="badge badge-success">Responded</p>
                                    @elseif($quotation->status == 0)
                                        <p class="badge badge-danger">Not Responded</p>
                                    @endif
                                    <h5>Duration</h5>
                                    <p><strong>{{date('F j, Y',strtotime($quotation->created_at))}}</strong></p>
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
