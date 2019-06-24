<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{asset("login-page/images/icons/favicon.ico")}}"/>
    <link rel="stylesheet" type="text/css" href=" {{asset("login-page/vendor/bootstrap/css/bootstrap.min.css")}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset("login-page/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset("login-page/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset("login-page/css/util.css")}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset("login-page/css/main.css")}} ">

</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url({{asset("login-page/images/bg-01.jpg")}});">
					<span class="login100-form-title-1">
						Sign In
					</span>
            </div>

            <form class="login100-form validate-form" method="POST" action="/login">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="email" placeholder="Enter username">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-18 mb-3" data-validate = "Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src=" {{asset("login-page/vendor/jquery/jquery-3.2.1.min.js")}} "></script>
<script src=" {{asset("login-page/vendor/bootstrap/js/popper.js")}} "></script>
<script src=" {{asset("login-page/vendor/bootstrap/js/bootstrap.min.js")}} "></script>
<script src=" {{asset("login-page/js/main.js")}} "></script>

</body>
</html>
