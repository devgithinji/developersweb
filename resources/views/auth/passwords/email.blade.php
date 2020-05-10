@extends('layouts.auth_master')
@section('content')
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
                        <form class="p-a30 dez-form text-center"  action="{{route('password.email')}}" method="POST">
                            <h3 class="form-title m-t0">Forget Password ?</h3>
                            <div class="dez-separator-outer m-b5">
                                <div class="dez-separator bg-primary style-liner"></div>
                            </div>
                            <p>Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input name="email" required="" class="form-control" placeholder="Email Id"
                                       type="email"/>

                            </div>
                            @if($errors->has('email'))
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group text-left"><a class="site-button outline gray" data-toggle="tab"
                                                                 href="{{route('login')}}">Back</a>
                                <button class="site-button pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bottom-footer text-center text-white">
                <p>{{date('Y')}} © Densoft Developers Reset Password Request </p>
            </div>
        </div>
    </div>
@endsection

@endsection
