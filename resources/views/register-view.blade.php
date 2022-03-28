<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/login.css') }}">
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
  rel="stylesheet"
/>
    <title>Register</title>
    <style>
body {
  margin: 0;
  padding: 0;
  background: #0F2027;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 300px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form  {
  margin-top: -15px;
}

#register-link {
    margin-top: -35px;
    margin-left:390px;
}
    </style>
</head>
<body>
    <section class="vh-100 gradient-custom">




        <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="register" method="POST">
                        @csrf
                            <h3 class="text-center text-white ">REGISTRO</h3>
                            <div class="form-group">
                                <input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="CORREO" name="email" required>
                            </div>
                            <span style="color:red;">@error('email')
                            {{$message}}
                            @enderror
                        </span>
                        <br>
                            <div class="form-group">
                                <input class="form-control" type="password" id="typePasswordX" placeholder="CONTRASENA" name="password" required>
                            </div>
                            <span style="color:red;">@error('password')
                            {{$message}}
                            @enderror
                        </span>
                        <br>
                            <div class="form-group">
                                <input type="password" id="typePasswordX" class="form-control" placeholder="REPETIR CONTRASENA" name="password_confirmation" required/>
                            </div>
                            <span style="color:red;">@error('password')
                            {{$message}}
                            @enderror
                        </span>
                        <br>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn text-white btn-md">Registrarse</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="login" class="text-white">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

      </section>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
</body>
</html>
