@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-nd-8 col-nd-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
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
                        <form method="POST" action="register">
                            {!! csrf_field() !!}

                            <div class="form-group">
                                Name
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                Email
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            </div>

                            <div class="form-group">
                                Password
                                <input type="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                Confirm Password
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>


                            <br>
                            <div class="form-group">
                                <button type="submit" class = "btn btn-primary form-control">Register</button>
                            </div>
                        </form>
                            <h6><a href="{{action('Auth\AuthController@postLogin')}}">Login</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

