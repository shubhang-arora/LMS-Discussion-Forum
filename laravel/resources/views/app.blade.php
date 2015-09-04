<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LMS-DISCUSSION-FORUM</title>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css"  />
    <link  rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

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

<script src="http://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<link rel="stylesheet" href="{{asset('includes/css/summernote.css')}}" >
<script src="{{asset('includes/js/summernote.min.js')}}"></script>
<script>

    $(document).ready(function(){
        var PageURL = window.location.pathname,
                URLVariables = PageURL.split('/');
        for(var i=0;URLVariables[i]!=null;i++){

        }

        $(".writeComment").hide();
        $("#comment").click(function(){
            $(".writeComment").show();
        });
        $(".send-btn").click(function(){
            $.ajax({
                url : URLVariables[i-1]+'/comments',
                type: "post",
                data: {'comment':$('input[name=comment]').val(),'parentID':URLVariables[i-1] ,'_token': $('input[name=_token]').val()},
                success: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@yield('footer')
</body>
</html>