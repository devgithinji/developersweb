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
                            <h1>Term Edit</h1>
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
                                <h4 class="card-title">Term Edit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('faq.update',$faq->id)}}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Question</label>
                                    <textarea class="form-control" rows="3" name="question">
                                        {{$faq->question}}
                                    </textarea>
                                    @if($errors->has('question'))
                                        <div class="invalid-feedback d-block">{{$errors->first('question')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea class="form-control" rows="3" name="answer">
                                        {{$faq->answer}}
                                    </textarea>
                                    @if($errors->has('answer'))
                                        <div class="invalid-feedback d-block">{{$errors->first('answer')}}</div>
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
