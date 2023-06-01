<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{url('backend-ui/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-ui/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('backend-ui/custom/admin.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5 admin-login">
            @include('backend.layouts.message')
            <h2>Change Customer Password</h2>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="password">Password:
                        <a style="color: red">{{$errors->first('password')}}</a>
                    </label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:
                        <a style="color: red">{{$errors->first('password_confirmation')}}</a>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>


                <div class="form-group">
                    <button class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

