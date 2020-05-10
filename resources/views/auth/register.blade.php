@extends('layouts.auth_master')
@section('content')
    <div id="particles-js" class="page-content dez-login bg-primary-dark">
        <div class="relative z-index3">
            <div class="top-head text-center p-a40 logo-header">
                <a href="index.html">
                    <img src="{{asset('frontend/images/logo-white1.png')}}" alt=""/>
                </a>
            </div>
            <div class="login-form style-2">
                <div class="tab-content nav">
                    <div id="login" class="tab-pane active text-center">
                        <form action="{{route('register')}}" class="p-a30 dez-form text-center text-center"
                              method="POST">
                            @csrf
                            <h3 class="form-title m-t0">Sign Up</h3>
                            <div class="dez-separator-outer m-b5">
                                <div class="dez-separator bg-primary style-liner"></div>
                            </div>
                            <p>Enter your personal details below: </p>
                            <div class="form-group">
                                <input name="name" required="" class="form-control" placeholder="Full Name"
                                       type="text"/>
                                @if($errors->has('name'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="email" required="" class="form-control" placeholder="Email" type="email"/>
                                @if($errors->has('email'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input name="password" required="" class="form-control" placeholder="Password" type="password"/>
                                @if($errors->has('password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="">
                                <input name="password_confirmation" required="" class="form-control" placeholder="Re-type Your Password" type="password"/>
                            </div>
                            <div class="m-b30">
                                <input id="check2" type="checkbox" name="agreement"/>
                                <label for="check2">I agree to the <a href="#">Terms of Service </a>& <a href="#">Privacy
                                        Policy</a> </label>
                                @if($errors->has('agreement'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('agreement') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-left ">
                                <a class="site-button outline gray" href="{{route('login')}}">Sign In</a>
                                <button class="site-button pull-right">Register</button>
                            </div>
                        </form>
                    </div>
                    {{--  <div id="forgot-password" class="tab-pane fade ">
                          <form class="p-a30 dez-form text-center">
                              <h3 class="form-title m-t0">Forget Password ?</h3>
                              <div class="dez-separator-outer m-b5">
                                  <div class="dez-separator bg-primary style-liner"></div>
                              </div>
                              <p>Enter your e-mail address below to reset your password. </p>
                              <div class="form-group">
                                  <input name="dzName" required="" class="form-control" placeholder="Email Id" type="text"/>
                              </div>
                              <div class="form-group text-left"> <a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
                                  <button class="site-button pull-right">Submit</button>
                              </div>
                          </form>
                      </div>--}}
                </div>
            </div>
            <div class="bottom-footer text-center text-white">
                <p>{{date('Y')}} © Densoft Developers Register Account </p>
            </div>
        </div>
    </div>
@endsection

