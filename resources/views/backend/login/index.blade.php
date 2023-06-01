<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{asset('backend-ui/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend-ui/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend-ui/custom/admin.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5 admin-login">
            @include('backend.layouts.message')
            <h2><i class="fa fa-sign-in"></i> Admin Login</h2>
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username">Username:
                        <a style="color: red">{{$errors->first('username')}}</a>
                    </label>
                    <input type="text" name="username" id="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:
                        <a style="color: red">{{$errors->first('password')}}</a>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label >
                        <input type="checkbox" name="remember_me">&ensp;Remember Me
                    </label>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Login</button>
                </div>
                <a href="{{route('password_reset')}}">Forgot Password</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
