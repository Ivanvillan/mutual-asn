<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Vendedores</title>
</head>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <h4>VENDEDORES</h4>
            <div class="input-field col s6">
                <input id="search" type="text" class="validate">
                <label for="search">Buscador...</label>
            </div>
            <div class="col s12 m12 l12">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tel. Fijo</th>
                            <th>Tel. Móvil</th>
                            <th>Domicilio</th>
                            <th>Correo</th>
                            <th>Información</th>
                            <th>Movimientos</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="description-modal" class="modal">
            <div class="modal-content">
            <ul id="tabs-swipe" class="tabs">
                <li class="tab col s12 m6 l6"><a href="#tab1" class="active">Test 1</a></li>
                <li class="tab col s12 m6 l6"><a href="#tab2">Test 2</a></li>
            </ul>
            <div id="tab1" class="col s12 m4 l4 blue">Test 1</div>
            <div id="tab2" class="col s12 m4 l4 red">Test 2</div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green">Agree</a>
            </div>
        </div>
        <div id="movement-modal" class="modal">
            <div class="modal-content">
            <div class="col s12 m4 l4 red">Test 2</div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green">Agree</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            getSellers();
            search();
        });
        function getSellers(){
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/sellers",
                dataType: "json",
                success: function (response) {
                    console.log(response.result);
                    let row = response.result;
                    let html = [];
                    for (let i=0; i < row.length; i++){
                    html.push(
                    `<tr class="content">
                    <td>${row[i].ApellidoNombreV}</td> 
                    <td>${row[i].TelFijo}</td> 
                    <td>${row[i].TelMovil}</td> 
                    <td>${row[i].Domicilio}</td> 
                    <td>${row[i].CorreoElectronico}</td> 
                    <td> <a href="#description-modal" class="btn description right modal-trigger"><i class="material-icons">description</i></a></td> 
                    <td><a href="#movement-modal" class="btn right modal-trigger"><i class="material-icons">assignment</i></a></td>  
                    </tr>`
                    );
                }    
                $('table>tbody').html(html.join(''));
                $('.modal').modal();
                $('.tabs').tabs();
                },
                error: function(){
                    console.log('error');
                }
            });
        }
        function search(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".content").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        }
    </script>
</body>
</html>