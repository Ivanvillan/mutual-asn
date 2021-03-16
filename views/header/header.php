<?php 
session_start();
if (isset($_SESSION['ID'])) {
    $userid = $_SESSION['ID'];
    $username = $_SESSION['USERNAME']; 
  }else{
    header("Location: ../login/login.php");
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Mutual ASN | Header</title>
    <style>
        .offset-logo{
            margin-left: 20px !important;
        }
        nav, header, main, footer {
            padding-left: 300px !important;
        }
        /* .sidenav-left {
            width: 275px !important
        } */
        .session-name-padding {
            padding-left: 5px !important;
            margin-right: 10px;
        }
        .color-links {
            color: #000000;
        }
        .container{
            margin-left: 265px;
        }
        @media only screen and (max-width : 992px) {
            nav, header, main, footer {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
            .container{
            margin-left: 15px !important;
            }
        }
    </style>
</head>
<body>
    <ul id="slide-out" class="sidenav blue darken-4 sidenav-fixed sidenav-left" style="width: 250px !important">
        <div class="center-align">
        <img class="responsive-img" src="../../assets/logo-mutual.png" width="120" height="120">
        </div>
        <div class="divider grey blue-grey lighten-5"></div>
        <li><a href="index.php" class="white-text" style="font-size: 16px;">Gráficos</a></li>
        <li><a href="clients.php" class="white-text" style="font-size: 16px;">Clientes</a></li>
        <li><a href="seller.php" class="white-text" style="font-size: 16px;">Vendedores</a></li>
        <li><a href="inputs.php" class="white-text" style="font-size: 16px;">Ingresar planilla</a></li>
        <li><a href="reports.php" class="white-text" style="font-size: 16px;">Informes</a></li>
    </ul>
    <ul class="sidenav blue darken-4" id="sidenav-mobile">
        <li><a href="index.php" class="white-text">Gráficos</a></li>
        <li><a href="clients.php" class="white-text">Clientes</a></li>
        <li><a href="seller.php" class="white-text">Vendedores</a></li>
        <li><a href="inputs.php" class="white-text">Ingresar planilla</a></li>
        <li><a href="reports.php" class="white-text">Informes</a></li>
        <div class="divider"></div>
        <li><a class="session-name white-text"></a></li>
        <li><a href="!#" class="logout"><i class="material-icons white-text">exit_to_app</i></a></li>
    </ul>
    <div class="navbar-fixed">
        <nav class="blue darken-4">
            <div class="nav-wrapper">
                <a href="#" data-target="sidenav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><i class="material-icons prefix ">person</i></li>
                    <li><span class="session-name session-name-padding"></span></li>
                    <li><a href="!#" class="logout"><i class="material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        let userid = <?php echo json_encode($userid) ?>;
        let username = <?php echo json_encode($username) ?>;
        $('.sidenav').sidenav();
        $('#slide-out').sidenav({ edge: 'left' });
        $('.session-name').html(username.toUpperCase());
        $('.logout').click(function (e) { 
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/session/logout",
                data: {
                    id: userid
                },
                dataType: "json",
                success: function (response) {
                    M.toast({html: 'Sesión terminada'});
                    window.location.href = "../login/login.php";
                },
                error: function(){
                    M.toast({html: 'Error al terminar sesión'});
                }
            });
        });
    </script>
</body>
</html>