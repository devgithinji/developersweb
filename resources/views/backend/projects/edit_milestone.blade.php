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
                            <h1>{{$data['page_name1']}}</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        UI Kit
                                    </li>
                                    <li class="breadcrumb-item active text-primary"
                                        aria-current="page">{{$data['page_name2']}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- start Tabs contant -->

            <div class="row tabs-contant">
                <div class="col-xxl-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">{{$data['page_name2']}}</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab round">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="home-07-tab" data-toggle="tab"
                                           href="#home-07" role="tab" aria-controls="home-07" aria-selected="true"> <i
                                                class="fa fa-home"></i>Summary</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-07-tab" data-toggle="tab" href="#profile-07"
                                           role="tab" aria-controls="profile-07" aria-selected="false"><i
                                                class="fa fa-user"></i> Tasks </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="portfolio-07-tab" data-toggle="tab" href="#portfolio-07"
                                           role="tab" aria-controls="portfolio-07" aria-selected="false"><i
                                                class="fa fa-picture-o"></i> other </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-07-tab" data-toggle="tab" href="#contact-07"
                                           role="tab" aria-controls="contact-07" aria-selected="false"><i
                                                class="fa fa-check-square-o"></i> Contact </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade py-3 active show" id="home-07" role="tabpanel"
                                         aria-labelledby="home-07-tab">
                                        <form
                                            action="{{route('project.milestone.update',[$project->id,$milestone->id])}}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="Enter name" value="{{$milestone->name}}">
                                                @if($errors->has('name'))
                                                    <div
                                                        class="invalid-feedback d-block">{{$milestone>first('name')}}</div>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label>Project Date Range</label>
                                                <div class="input-group" data-date="23/11/2018"
                                                     data-date-format="mm/dd/yyyy">
                                                    <input type="text" class="form-control range-from" name="start_date"
                                                           value="{{$milestone->start_date}}">
                                                    <span class="input-group-addon">To</span>
                                                    <input class="form-control range-to" type="text" name="finish_date"
                                                           value="{{$milestone->completion_date}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" rows="3" name="description">
                                                    {{$milestone->description}}
                                                </textarea>
                                                @if($errors->has('description'))
                                                    <div
                                                        class="invalid-feedback d-block">{{$errors->first('description')}}</div>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade py-3" id="profile-07" role="tabpanel"
                                         aria-labelledby="profile-07-tab">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class=" card-statistics">
                                                    <div class="card-header container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <h3>Task List</h3>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <a href="{{route('milestone.task.create',[$milestone->id])}}"
                                                                   class="btn btn-primary float-right">create
                                                                    new</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table id="datatable"
                                                               class="table table-bordered dt-responsive nowrap"
                                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Developer</th>
                                                                <th>Status</th>
                                                                <th>Dates</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($tasks as $i=>$task)
                                                                <tr>
                                                                    <td class="text-center">{{++$i}}</td>
                                                                    <td class="text-center">{{ucwords($task->name)}}</td>


                                                                    <td class="text-center">{{Str::limit($task->description,50)}}</td>

                                                                    <td class="text-center">{{$task->employee->name}}</td>

                                                                    <td class="text-center">
                                                                        @if($milestone->status == 0)
                                                                            <a type="button"
                                                                               href="{{route('project.status.update',[$task->id,1])}}"
                                                                               class="badge badge-danger-inverse">Incomplete</a>
                                                                        @elseif($milestone->status == 1)
                                                                            <a type="button"
                                                                               href="{{route('project.status.update',[$task->id,0])}}"
                                                                               class="badge badge-success-inverse">Complete</a>
                                                                        @elseif($milestone->status == 2)
                                                                            <a type="button"
                                                                               href="{{route('project.status.update',[$task->id,0])}}"
                                                                               class="badge badge-warning-inverse">In Progress</a>
                                                                        @endif
                                                                    </td>

                                                                    <td class="text-center">
                                                                        {{date('F d, Y',strtotime($task->start_date))}}
                                                                        <br>
                                                                        to
                                                                        <br>
                                                                        {{date('F d, Y',strtotime($task->completion_date))}}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="{{route('milestone.task.edit',$task->id)}}"
                                                                           class="btn btn-round btn-inverse-success" type="button">edit</a>
                                                                        <a href="{{route('milestone.task.view',$task->id)}}"
                                                                           class="btn btn-round btn-inverse-primary" type="button">view</a>
                                                                        <a href="{{route('milestone.task.delete',$task->id)}}"
                                                                           class="btn btn-round btn-inverse-danger" id="delete"
                                                                           type="button">delete</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade py-3" id="portfolio-07" role="tabpanel"
                                         aria-labelledby="portfolio-07-tab">
                                        <p>The sad thing is the majority of people have no clue about what they truly
                                            want. They have no clarity. When asked the question, responses will be
                                            superficial at best, and at worst, will be what someone else wants for
                                            them.</p>
                                    </div>
                                    <div class="tab-pane fade py-3" id="contact-07" role="tabpanel"
                                         aria-labelledby="contact-07-tab">
                                        <p>Imagine reaching deep inside you for all the strength and wisdom that you
                                            need to make this decision today. As you do so, imagine that when you choose
                                            to make that decision that deep inside your mind you are switching off the
                                            alternative path, you are switching off the opportunity to drift back to
                                            that place. Then step out and take your future path. Absorb yourself in the
                                            sensations, the feelings, the sights, the sounds and of course continue to
                                            engage in your future the way I have discussed in previous articles on this
                                            blog.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Tabs contant -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
