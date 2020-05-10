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
                            <h1>General Settings</h1>
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
                <div class="col-md-12">
                    <div class="card card-statistics">
                        <div class="card-header container-fluid">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>General Settings</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('general.settings.create')}}" class="btn btn-primary float-right">edit
                                        setting</a>
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
                                    <th>value</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $row=>$setting)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center" >
                                            @if($setting->section_id == 1)
                                                Logo
                                            @elseif($setting->section_id == 2)
                                                Hero
                                            @elseif($setting->section_id == 3)
                                                About Company
                                            @elseif($setting->section_id == 4)
                                                Our Projects
                                            @elseif($setting->section_id == 5)
                                                Our Services
                                            @elseif($setting->section_id == 6)
                                                Our Team
                                            @elseif($setting->section_id == 7)
                                                Reviews
                                            @endif
                                            {{ucwords($setting->name)}}
                                        </td>
                                        <td class="text-center">
                                            @if($setting->name == 'logo' ||  $setting->name == 'image')
                                                <img src="{{asset('frontendimages/'.$setting->value)}}" width="100"
                                                     alt="">
                                            @else
                                                {{Str::limit($setting->value,100)}}
                                            @endif
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
