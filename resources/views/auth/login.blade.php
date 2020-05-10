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
                        <form action="{{route('login')}}" class="p-a30 dez-form" method="POST">
                            @csrf
                            <h3 class="form-title m-t0">Sign In</h3>
                            <div class="dez-separator-outer m-b5">
                                <div class="dez-separator bg-primary style-liner"></div>
                            </div>
                            <p>Enter your e-mail address and your password. </p>
                            <div class="form-group">
                                <input name="email" required="" class="form-control" placeholder="Email" type="email"/>
                                @if($errors->has('email'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="password" required="" class="form-control " placeholder="Type Password" type="password"/>
                                @if($errors->has('password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-left">
                                <button class="site-button dz-xs-flex m-r5">login</button>
                                <label>
                                    <input id="check1" name="remeber" type="checkbox"/>
                                    <label for="check1"> Remember me</label>
                                </label>
                                <a  href="{{route('password.request')}}" class="m-l5"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
                            </div>
                            <div class="dz-social clearfix">
                                <h5 class="form-title m-t5 pull-left">Sign In With</h5>
                                <ul class="dez-social-icon dez-border pull-right dez-social-icon-lg text-white">
                                    <li><a class="fa fa-facebook  fb-btn" href="javascript:;" target="bank"></a></li>
                                    <li><a class="fa fa-twitter  tw-btn" href="javascript:;" target="bank"></a></li>
                                    <li><a class="fa fa-linkedin link-btn" href="javascript:;" target="bank"></a></li>
                                    <li><a class="fa fa-google-plus  gplus-btn" href="javascript:;" target="bank"></a></li>
                                </ul>
                            </div>
                        </form>
                        <div class="bg-primary p-a15 bottom">
                            <a  href="{{route('register')}}" class="text-white">Create an account</a>
                        </div>
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
                   {{-- <div id="developement-1" class="tab-pane fade">
                        <form class="p-a30 dez-form text-center text-center">
                            <h3 class="form-title m-t0">Sign Up</h3>
                            <div class="dez-separator-outer m-b5">
                                <div class="dez-separator bg-primary style-liner"></div>
                            </div>
                            <p>Enter your personal details below: </p>
                            <div class="form-group">
                                <input name="dzName" required="" class="form-control" placeholder="Full Name" type="text"/>
                            </div>
                            <div class="form-group">
                                <input name="dzName" required="" class="form-control" placeholder="User Name" type="text"/>
                            </div>
                            <div class="form-group">
                                <input name="dzName" required="" class="form-control" placeholder="Email Id" type="text"/>
                            </div>

                            <div class="form-group">
                                <input name="dzName" required="" class="form-control" placeholder="Password" type="password"/>
                            </div>
                            <div class="">
                                <input name="dzName" required="" class="form-control" placeholder="Re-type Your Password" type="password"/>
                            </div>
                            <div class="m-b30">
                                <input id="check2" type="checkbox"/>
                                <label for="check2">I agree to the <a href="#">Terms of Service </a>& <a href="#">Privacy Policy</a> </label>
                            </div>
                            <div class="form-group text-left ">
                                <a class="site-button outline gray" data-toggle="tab" href="#login">Back</a>
                                <button class="site-button pull-right">Submit</button>
                            </div>
                        </form>
                    </div>--}}
                </div>
            </div>
            <div class="bottom-footer text-center text-white">
                <p>{{date('Y')}} © Densoft Developers Login Account </p>
            </div>
        </div>
    </div>
@endsection
