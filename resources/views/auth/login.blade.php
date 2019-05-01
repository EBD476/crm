@extends('layouts.app2')

@section('content')

    <div class="single-widget-container">
        <div class="col-md-12">
        <div class="col-md-offset-3">
        <section class="widget login-widget col-md-6">
            <header class="text-align-left">
                <h1>Login</h1><br>
                <span>Sign In to your account</span>
            </header>
            <div class="body">
                <form class="no-margin"
                      method="POST" action="{{ route('login') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            {{--<label for="email" >Email</label>--}}
                            <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                <input id="username" type="text" class="form-control input-lg input-transparent"
                                       name="username" placeholder="{{__('Username')}}">

                            </div>
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong  style="color: red;">{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            {{--<label for="password" >Password</label>--}}

                            <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                                <input id="password" type="password" class="form-control input-lg input-transparent"
                                       name="password"   placeholder="{{__('Password')}}">
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                 </span>
                            @endif
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-block btn-lg btn-cyan">
                            <span class="small-circle"><i class="fa fa-caret-right"></i></span>
                            <small>{{__('Login')}} </small>
                        </button>
                        <a class="forgot" href="#">Forgot Username or Password?</a>
                    </div>
                </form>
            </div>
            <footer>

            </footer>


        </section>

            <div class="col-md-6 login-widget-more" >
                <section class="widget hanta-logo" >
                    <h2 class="text-center"> HANTA CRM</h2>
                    <p class="text-center">Device Configuration</p>
                    <br><br><br><br><br><br><br><br><br><br>
                    <small>Copyright © 2018 Hanta Smart Home</small>
                </section>
            </div>
        </div>


    </div>
    </div>



{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

    <!-- common libraries. required for every page-->
    {{--<script src="js/jquery.min.js"></script>--}}
    {{--<script src="lib/jquery-pjax/jquery.pjax.js"></script>--}}
    {{--<script src="js/bootstrap.min.js"></script>--}}
    {{--<script src="lib/widgster/widgster.js"></script>--}}
    {{--<script src="lib/underscore/underscore.js"></script>--}}

    <!-- common application js -->
    {{--<script src="js/app.js"></script>--}}
    {{--<script src="js/settings.js"></script>--}}

@endsection
