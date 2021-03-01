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
            padding-left: 300px;
        }
        .container{
            margin-left: 350px;
        }
        @media only screen and (max-width : 992px) {
            nav, header, main, footer {
                padding-left: 0;
                padding-right: 0;
            }
        }
    </style>
</head>
<body>
    <ul id="slide-out" class="sidenav sidenav-fixed sidenav-left">
        <div class="center-align">
        <img class="responsive-img" src="../../assets/logo-mutual.png" width="150" height="150">
        </div>
        <div class="divider"></div>
        <li><a href="#!">First Sidebar Link</a></li>
        <li><a href="#!">Second Sidebar Link</a></li>
    </ul>
    <ul class="sidenav" id="sidenav-mobile">
        <li><a href="#">Username</a></li>
        <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
    </ul>
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-target="sidenav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#">Username</a></li>
                    <li><a href="#"><i class="material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $('.sidenav').sidenav();
        $('#slide-out').sidenav({ edge: 'left' });
    </script>
</body>
</html>