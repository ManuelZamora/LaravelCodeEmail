<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/login.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />
    <title>Code</title>
    <style>
        body {
            background: #0F2027;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2C5364, #203A43, #0F2027);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }

    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">

        <div id="login">
            <h3 class="text-center text-white pt-5">SE HA ENVIADO UN CODIGO A TU CORREO </h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="login-with-code" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                <div class="form-group">
                                    <br>
                                    <label for="username" class=" text-white">ingresa el codigo que se envio a tu
                                        correo:</label><br>
                                    <input type="number" id="typeEmailX" class="form-control form-control-lg" name="code"
                                        required />
                                </div>
                                <span style="color:red;">
                                    @error('code')
                                        {{ $message }}
                                    @enderror
                                </span><br>
                                <button type="submit" class="btn  text-white btn-md">Confirmar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
    </section>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>
</body>

</html>
