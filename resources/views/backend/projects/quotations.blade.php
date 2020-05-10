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
                            <h1>Projects List</h1>
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
                                <h3 class="ml-3">Project Quotations List</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Details</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Dates</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotations as $row=>$quotation)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">
                                            Client Name: {{ucwords($quotation->name)}}
                                            <br>
                                            Contact: {{ucwords($quotation->contact)}}
                                        </td>

                                        <td class="text-center">{{ucwords($quotation->type->name)}}</td>

                                        <td class="text-center">{{Str::limit($quotation->description,20)}}</td>

                                        <td class="text-center">
                                            @if($quotation->status == 0)
                                                <a type="button"
                                                   href="{{route('quotation.status',[$quotation->id,1])}}"
                                                   class="badge badge-danger-inverse">not responded</a>
                                            @elseif($quotation->status == 1)
                                                <a type="button"
                                                   href="{{route('quotation.status',[$quotation->id,0])}}"
                                                   class="badge badge-success-inverse">responded</a>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{date('F d, Y',strtotime($quotation->created_at))}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('quotationView',$quotation->id)}}"
                                               class="btn btn-round btn-inverse-primary" type="button">view</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card card-statistics">
                        <div class="card-header container-fluid">
                            <div class="row">
                                <h3 class="ml-3">Project Proposal List</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Details</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($proposals as $row=>$proposal)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">
                                           Client Name: {{ucwords($proposal->user->name)}}
                                            <br>
                                            project Name: {{$proposal->name}}
                                        </td>
                                        <td class="text-center">{{Str::limit($proposal->description,20)}}</td>

                                        <td class="text-center">
                                            @if($proposal->status == 0)
                                                <a type="button"
                                                   href="{{route('proposal.status',[$proposal->id,1])}}"
                                                   class="badge badge-danger-inverse">not responded</a>
                                            @elseif($proposal->status == 1)
                                                <a type="button"
                                                   href="{{route('proposal.status',[$proposal->id,0])}}"
                                                   class="badge badge-success-inverse">responded</a>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{date('F d, Y',strtotime($proposal->created_at))}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('proposalView',$proposal->id)}}"
                                               class="btn btn-round btn-inverse-primary" type="button">view</a>
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
