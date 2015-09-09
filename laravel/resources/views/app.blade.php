<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LMS-DISCUSSION-FORUM</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"  />
    <link rel="stylesheet" href="{{asset('includes/css/summernote.css')}}" >
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

</head>
<body>

<div class="container">
    @if (Auth::check())
        <p align="right">
            Welcome {{Auth::user()->name}}
            <br>
            <a href={{action('Auth\AuthController@getLogout')}}>Logout</a>
        </p>
    @endif
    @unless(Auth::check())
        <p align="right">
            <a href={{action('Auth\AuthController@postLogin')}}>Login</a>
            <a href={{action('Auth\AuthController@postRegister')}}>Register</a>
        </p>

    @endunless
    @yield('content')
</div>
<script src="{{asset('js/comments.js')}}"></script>
<script src="{{asset('js/summernote.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<script src="{{asset('includes/js/summernote.min.js')}}"></script>

@yield('footer')
</body>
</html>