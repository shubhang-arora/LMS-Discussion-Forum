@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-nd-8 col-nd-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        @if(count($errors)>0)
                            <div class="alert aleert-danger">
                                <strong>Whoops!</strong> There are some problem with ypur input
                                <ul>
                                    @foreach($errors->all() as $error))
                                    <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                                    <!-- resources/views/auth/login.blade.php -->

                            <form method="POST" action="http://localhost:7777/series/firstfile/LMS-DISCUSSION-FORUM/laravel/public/auth/login">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                    Email
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    Password
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" name="remember" > Remember Me
                                </div>

                                <div class="form-group">
                                    <button type="submit" class = "btn btn-primary form-control">Login</button>
                                </div>

                                <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                            </form>
                            <h6><a href="{{action('Auth\AuthController@getRegister')}}">Register</a></h6>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop