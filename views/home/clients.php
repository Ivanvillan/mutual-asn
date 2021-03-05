<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Clientes</title>
</head>
<style>
    .padding-td{
        padding:0 !important;
        border:0 !important;
    }
</style>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <h4>CLIENTES</h4>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="rep">
                        <option value="0" disabled selected>Repartición</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="state">
                        <option value="0" disabled selected>Estado</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="seller">
                        <option value="0" disabled selected>Vendedor</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Legajo</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>CBU</th>
                            <th>Denominacion</th>
                            <th>Información</th>
                            <th>Movimientos</th>
                            <th>Observaciones</th>
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
            getClients();
        });
        function getClients(){
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/customers/get/all/all/all",
                dataType: "json",
                success: function (response) {
                    console.log(response.result);
                    let row = response.result;
                    let html = [];
                    for (let i=0; i < row.length; i++){
                    html.push(
                    `<tr>
                    <td>${row[i].Legajo}</td> 
                    <td>${row[i].ApellidoNombreC}</td> 
                    <td>${row[i].DNI}</td> 
                    <td>${row[i].CBU}</td> 
                    <td>${row[i].Denominacion}</td> 
                    <td> <button class="btn description right"><i class="material-icons">description</i></button></td> 
                    <td><button class="btn right"><i class="material-icons">assignment</i></button></td> 
                    <td><button class="btn right"><i class="material-icons">library_books</i></button></td> 
                    </tr>
                    <tr class="child padding-td">
                        <td parent="td" class="padding-td">
                            <span>${row[i].Legajo}</span> 
                            <span><br></span>
                            <span>${row[i].ApellidoNombreC}</span> 
                        </td>
                        <td parent="td" class="padding-td">
                            <span>${row[i].DNI}</span> 
                            <span><br></span>
                            <span>${row[i].CBU}</span> 
                        </td>
                        <td parent="td" class="padding-td">
                            <span>${row[i].Denominacion}</span> 
                            <span><br></span>
                            <span>${row[i].Estado}</span> 
                        </td>
                        <td parent="td" class="padding-td">
                            <span>${row[i].domicilio}</span> 
                            <span><br></span>
                            <span>${row[i].telefono}</span> 
                        </td>
                        <td parent="td" class="padding-td">
                            <span>${row[i].ApellidoNombreV}</span> 
                        </td>
                    </tr>
                    `
                    );
                }    
                $('table>tbody').html(html.join(''));
                $('select').formSelect();
                $(function() {
                    $("td[parent=td]").find("span").hide();
                    $(".description").click(function(event) {
                        event.stopPropagation();
                        var $target = $(event.target);
                        if ( $target.closest("td").attr("parent") > 0 ) {
                            $target.slideUp();
                        } else {
                            $target.closest("tr").next().find("span").slideToggle();
                        }                    
                    });
                })
                },
                error: function(){
                    console.log('error');
                }
            });
        }
    </script>
</body>
</html>