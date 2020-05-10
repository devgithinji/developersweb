@extends('backend.master')
@section('login_content')
    <div class="app-contant">
        <div class="bg-white">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                        <div class="d-flex align-items-center h-100-vh">
                            <div class="login p-50">
                                <h1 class="mb-2">We Are Mentor</h1>
                                <p>Welcome back, please login to your account.</p>
                                <form action="{{route('employee.login')}}" class="mt-3 mt-sm-5" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Email*</label>
                                                <input type="text" name="email" class="form-control" placeholder="Email"/>
                                                @if($errors->has('email'))
                                                    <div class="text-danger">{{$errors->first('email')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Password*</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                                                @if($errors->has('password'))
                                                    <div class="text-danger">{{$errors->first('password')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-block d-sm-flex  align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                                    <label class="form-check-label" for="gridCheck">
                                                        Remember Me
                                                    </label>
                                                </div>
                                                <a href="javascript:void(0);" class="ml-auto">Forgot Password ?</a>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3 text-center">
                                            <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                        <div class="row align-items-center h-100">
                            <div class="col-7 mx-auto ">
                                <img class="img-fluid" src="{{asset('backend/img/bg/login.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
