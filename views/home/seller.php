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
                    <td> <button class="btn right"><i class="material-icons">description</i></button></td> 
                    <td><button class="btn right"><i class="material-icons">assignment</i></button></td> 
                    </tr>`
                    );
                }    
                $('table>tbody').html(html.join(''));
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