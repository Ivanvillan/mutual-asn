<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Vendedores</title>
    <style>
        .padding-description{
            padding: 5px !important;
        }
        .margin-h5{
            margin-bottom: 10px !important;
            margin-left: 0px !important;
            margin-right: 0px !important;
            margin-top: 0px !important;
        }
        .margin-a{
            margin-top: 3px !important;
        }
        .modal{ 
            width: 75% !important; 
        }
        .table-movement tbody tr td {
            font-size: 13px;
        }
        .table-movement tr {
            font-size: 13px;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <h4>VENDEDORES</h4>
            <div class="input-field col s6 searchSeller">
                <input id="searchSeller" type="text" class="validate">
                <label for="search">Buscar</label>
            </div>
            <div class="col s12 m12 l12 table-seller">
                <table class="highlight responsive-table seller-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tel. Fijo</th>
                            <th>Tel. Móvil</th>
                            <th>Domicilio</th>
                            <th>Correo</th>
                            <th>Editar</th>
                            <th>Movimientos</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="movs hide">
                <div class="col s12 m2 l2">
                    <div class="input-field">
                        <select name="" id="per">
                            <option value="0" disabled selected>Periodo</option>
                        </select>
                    </div>
                </div>
                <div class="col s12 m2 l2">
                    <div class="input-field">
                        <select name="" id="suc">
                            <option value="0" disabled selected>Sucursal</option>
                        </select>
                    </div>
                </div>
                <div class="col s12 m2 l2">
                    <div class="input-field">
                        <select name="" id="prod">
                            <option value="0" disabled selected>Producto</option>
                        </select>
                    </div>
                </div>
                <div class="col s12 m2 l2">
                    <div class="input-field">
                        <select name="" id="mov">
                            <option value="" disabled selected>Movimiento</option>
                            <option value="1">Débito</option>
                            <option value="2">Rechazo</option>
                            <option value="3">No Enviado</option>
                        </select>
                    </div>
                </div>
                <div class="col s12 m2 l2">
                    <div class="input-field">
                        <select name="" id="mot">
                            <option value="0" disabled selected>Tipo Rechazo</option>
                        </select>
                    </div>
                </div>
                <div class="input-field col s12 m2 l2 searchMovement">
                    <input id="searchMovement" type="text" class="validate">
                    <label for="search">Buscar</label>
                </div>
                <div class="col s12 m6 l6 btn-back">
                    <a href="#" class="btn right">Volver</a>
                </div>
                <div class="col s12 m12 l12 table-movement">
                    <table class="highlight responsive-table movement-table striped">
                        <thead>
                            <tr>
                                <th>Periodo</th>
                                <th>Leg.</th>
                                <th>Nomb.</th>
                                <th>DNI</th>
                                <th>CBU</th>
                                <th>Suc.</th>
                                <th>Rep.</th>
                                <th>Prod.</th>
                                <th>Cobrado</th>
                                <th>Conv.Cobro</th>
                                <th>Cuotas</th>
                                <th>C.Pend.</th>
                                <th>Imp.</th>
                                <th>Saldo</th>
                                <th>Rech.</th>
                                <th>Tip.Rech.</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="description-modal" class="modal">
            <div class="modal-content">
            <!-- INICIO FORMULARIO CLIENTE -->
                <div class="row form-row">
                    <h5 class="col s10 m10 l10 margin-h5">EDITAR VENDEDOR</h5>
                    <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                    <div class="col s12 m12 l12 divider" style="margin-bottom: 20px !important;"></div>
                    <form action="">
                        <div class="input-field col s12 m6 l6">
                            <input type="text" class="validate" id="name-l" name="name">
                            <label for="name-l">NOMBRE</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="telfijo-l" class="validate" name="fij">
                            <label for="telfijo-l">TELEFONO FIJO</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="telmovil-l" class="validate" name="mov">
                            <label for="telmovil-l">TELEFÓNO MOVIL</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="domicilio-l" class="validate" name="address">
                            <label for="domicilio-l">DOMICILIO</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="correoelectronico-l" class="validate" name="mail">
                            <label for="correoelectronico-l">CORREO</label>
                        </div>
                        <div class="modal-footer col s12 m6 l6" style="padding-top: 20px !important;">
                            <a href="#!" class="btn right seller-update">Aceptar</a>
                            <div class="preloader-wrapper preloader-update hide small right active">
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
                    </form>
                </div>
                <!-- FIN FORMULARIO CLIENTE -->
            </div>
        </div>
    </div>

    <script>
        // variables
        var sellerID;
        var selectedPer = 'all';
        var selectedSuc = 'all';
        var selectedProd = 'all';
        var selectedMov = 'all';
        var selectedTipRech;
        // 
        $(document).ready(function () {
            getSellers();
            searchSeller();
            searchMovement();
            $("#per").change(function(){
                selectedPer = $(this).children("option:selected").val();
                console.log(selectedPer);
            });
            $("#suc").change(function(){
                selectedSuc = $(this).children("option:selected").val();
                console.log(selectedSuc);
            });
            $("#prod").change(function(){
                selectedProd = $(this).children("option:selected").val();
                console.log(selectedProd);
            });
            $("#mov").change(function(){
                selectedMov = $(this).children("option:selected").val();
                console.log(selectedMov);
            });
            $("#tipRech").change(function(){
                selectedTipRech = $(this).children("option:selected").val();
                console.log(selectedTipRech);
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/periods",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].periodo}">${rows[i].periodo}</option>
                            `
                        );
                    }    
                    $('#per').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/offices",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].CodSucursal}">${rows[i].NombreSuc}</option>
                            `
                        );
                    }    
                    $('#suc').append(html.join(''));
                },
                error: function(){
                    console.log('error');
                }
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/products",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].CodProducto}">${rows[i].Descripcion}</option>
                            `
                        );
                    }    
                    $('#prod').append(html.join(''));
                },
                error: function(){
                    console.log('error');
                }
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/rejections",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].CodRechazo}">${rows[i].Motivo}</option>
                            `
                        );
                    }    
                    $('#mot').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
        });
        // 
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
                    `<tr class="content" sellerID="${row[i].CodVendedor}">
                    <td name="name-td">${row[i].ApellidoNombreV}</td> 
                    <td name="fij-td">${row[i].TelFijo}</td> 
                    <td name="mov-td">${row[i].TelMovil}</td> 
                    <td name="address-td">${row[i].Domicilio}</td> 
                    <td name="mail-td">${row[i].CorreoElectronico}</td> 
                    <td> <a href="#description-modal" class="btn description right modal-trigger"><i class="material-icons">edit</i></a></td> 
                    <td><a href="#movement-modal" class="btn movement right modal-trigger"><i class="material-icons">assignment</i></a></td>  
                    </tr>`
                    );
                }    
                $('.seller-table>tbody').html(html.join(''));
                $('.modal').modal();
                // 
                $('.description').click(function (e) { 
                    e.preventDefault();
                    var sellerName = $(this).parent().parent().find('td').eq(0).html();
                    var url = "http://localhost/mutualasn-api/public/entities/get/sellers/" + sellerName;
                    $.ajax({
                        type: "GET",
                        url: url,
                        dataType: "json",
                        success: function (response) {
                            var data = response.result;
                            console.log(data);
                            $('input[name="name"]').val(data[0].ApellidoNombreV);
                            $('input[name="fij"]').val(data[0].TelFijo);
                            $('input[name="mov"]').val(data[0].TelMovil);
                            $('input[name="address"]').val(data[0].Domicilio);
                            $('input[name="mail"]').val(data[0].CorreoElectronico);
                            sellerID = data[0].CodVendedor;
                            M.updateTextFields();
                        }
                    });
                });
                // 
                $('.movement').click(function (e) { 
                    e.preventDefault();
                    var element = $(this)[0].parentElement.parentElement;
                    paramMov = $(element).attr('sellerID')
                    getMovement(paramMov);
                    $('.table-seller').addClass('hide');
                    $('.searchSeller').addClass('hide');
                    $('.movs').removeClass('hide');
                    $('.btn-back').removeClass('hide');
                });
                },
                error: function(){
                    console.log('error');
                }
            });
        }
        // 
        $('.seller-update').click(function (e) { 
            $('.seller-update').addClass('hide');
            $('.preloader-update').removeClass('hide');
            var sellerName = $('input[name="name"]').val();
            var sellerFij = $('input[name="fij"]').val();
            var sellerMov = $('input[name="mov"]').val();
            var sellerAddress = $('input[name="address"]').val();
            var sellerMail = $('input[name="mail"]').val();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/entities/sellers",
                data: {
                    "apellidonombre": sellerName,
                    "telfijo": sellerFij,
                    "telmovil": sellerMov,
                    "domicilio": sellerAddress,
                    "correoelectronico": sellerMail,
                    "id": sellerID
                },
                dataType: "json",
                success: function (response) {
                    $('.seller-update').removeClass('hide');
                    $('.preloader-update').addClass('hide');
                    M.toast({html: '¡Vendedor actualizado!'});
                    getSellers();
                },
                error: function(){
                    M.toast({html: 'Error al actualizar vendedor'});
                    $('.seller-update').removeClass('hide');
                    $('.preloader-update').addClass('hide');
                }
            });
        });
        // 
        function getMovement(id){
            url = "http://localhost/mutualasn-api/public/movements/get/" + selectedPer + "/" + selectedSuc + "/" + 1 + "/" + selectedMov;
            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                success: function (response) {
                    console.log(response.result);
                    let row = response.result;
                    let html = [];
                    for (let i=0; i < row.length; i++){
                    html.push(
                    `<tr class="content">
                    <td>${row[i].Periodo}</td> 
                    <td>${row[i].Legajo}</td> 
                    <td>${row[i].ApellidoNombreC}</td> 
                    <td>${row[i].DNI}</td> 
                    <td>${row[i].CBU}</td> 
                    <td>${row[i].NombreSuc}</td> 
                    <td>${row[i].Denominacion}</td>  
                    <td>${row[i].Descripcion}</td>  
                    <td>${row[i].Cobrado}</td>  
                    <td>${row[i].ConvenioCobro}</td>  
                    <td>${row[i].Cuotas}</td>  
                    <td>${row[i].CuotasPendientes}</td>  
                    <td>${row[i].Importe}</td>  
                    <td>${row[i].Saldo}</td>  
                    <td>${row[i].Tipo}</td>  
                    <td>${row[i].Motivo}</td>  
                    </tr>`
                    );
                }  
                $('.movement-table>tbody').html(html.join(''));
                }
            });
        }
        // 
        $('.btn-back').click(function (e) { 
            e.preventDefault();
            $('.table-seller').removeClass('hide');
            $('.searchSeller').removeClass('hide');
            $('.btn-back').addClass('hide');
            $('.movs').addClass('hide');
        });
        // 
        function searchSeller(){
            $("#searchSeller").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".content").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        }
        // 
        function searchMovement(){
            $("#searchMovement").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".content").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        }
    </script>
</body>
</html>