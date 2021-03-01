<?php
session_start();
if(!empty($_SESSION['ID'])){
header('Location: ../home/index.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body{
            background: linear-gradient(rgba(255,255,255,.7), rgba(255,255,255,.7)), url('../../assets/mutual.jpg');
            background-size: cover;
            background-position: center;
        }
        h1 {
            line-height: 1;
            font-weight: 100;
        }
        h3 {
            line-height: 1;
            font-weight: 100;
        }
        h5 {
            line-height: 1;
            font-weight: 100;
        }
        .margin-col {
            margin-bottom: 10px !important;
            margin-top: 10px !important;
        }
        h1.margin-col{
            margin-bottom: 10px !important;
            margin-top: 20px !important;
        }
        .mt {
            margin-top: 20px !important;
        }
    </style>
    <title>Mutual ASN | Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="col s12 m6 l6 offset-m3 offset-l3 center-align margin-col text-flow">¡Bienvenido!</h1>
            <h3 class="col s12 m6 l6 offset-m3 offset-l3 center-align margin-col text-flow">Sistema administrativo</h3>
            <div class="col s12 m6 l6 offset-m3 offset-l3 center-align">
                <div class="card horizontal hoverable">
                    <div class="card-content">
                        <span class="card-title left-align text-flow">INICIO DE SESIÓN</span>
                        <div class="divider"></div>
                        <div class="input-field col s12 m12 l12 mt">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" class="activate" name="user">
                            <label for="Nombre">Usuario</label>
                        </div>
                        <div class="input-field col s12 m12 l12">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" class="activate" name="password">
                            <label for="Contraseña">Contraseña</label>
                        </div>
                        <button class="waves-effect waves-yellow blue-grey lighten-5 black-text btn right login">INGRESAR</button>
                        <div class="preloader-wrapper hide small active">
                            <div class="spinner-layer spinner-red-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <h5 class="col s12 m6 l6 offset-m3 offset-l3 center-align margin-col text-flow">MUTUAL ASN</h5>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $('.login').click(function (e) { 
            e.preventDefault();
            let user = $("input[name=user]").val();
            let password = $("input[name=password]").val();
            $('.login').addClass('hide');
            $('.preloader-wrapper').removeClass('hide');
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/session/login",
                data: {
                    user: user,
                    password: password 
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    window.location.href = "../home/index.php";
                },
                error: function(){
                    $('.login').removeClass('hide');
                    $('.preloader-wrapper').addClass('hide');
                    M.toast({html: 'Error al iniciar sesion, compruebe los datos ingresados'});
                }
            });
        });
    </script>
</body>

</html>