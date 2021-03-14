<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Clientes</title>
    <style>
        .container{
            margin-left: 300px !important;
        }
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
        .margin-b{
            margin-top: 25px !important;
        }
        .modal{ 
            width: 75% !important; 
        }
        i.icon-green{
            color: #1b5e20;
        }
        i.icon-red{
            color: #b71c1c;
        }
        i.icon-orange{
            color: #f57c00;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <h4>CLIENTES</h4>
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="rep">
                        <option value="0" disabled selected>Repartición</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="state">
                        <option value="" disabled selected>Estado</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="sell">
                        <option value="0" disabled selected>Vendedor</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3 margin-b">
                <a href="#" class="btn btn-clean blue-grey darken-4">Limpiar</a>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <input type="text" id="search">
                    <label for="search">Buscar</label>
                </div>
            </div>
            <div class="col s12 m12 l12">
                <table class="highlight responsive-table client-table">
                    <thead>
                        <tr>
                            <th>Legajo</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>CBU</th>
                            <th>Reparticion</th>
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
        <!-- MODAL CLIENTE: INFORMACION - EDICION -->
        <div id="description-modal" class="modal">
            <div class="modal-content">
            <!-- INICIO FORMULARIO CLIENTE -->
                <div class="row hide form-row">
                    <a href="#" class="client-show col s1 m1 l1 margin-a"><i class="material-icons prefix" style="color: #000 !important;">arrow_back</i></a>
                    <h5 class="col s10 m10 l10 margin-h5">EDITAR CLIENTE</h5>
                    <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                    <div class="col s12 m12 l12 divider" style="margin-bottom: 20px !important;"></div>
                    <form action="">
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="leg-l" class="validate" name="nleg">
                            <label for="leg-l">LEGAJO</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" class="validate" id="name-l" name="name">
                            <label for="name-l">NOMBRE</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="dni-l" class="validate" name="dni">
                            <label for="dni-l">DNI</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="cbu-l" class="validate" name="cbu">
                            <label for="cbu-l">CBU</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="tel-l" class="validate" name="tel">
                            <label for="tel-l">TELÉFONO</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <input type="text" id="address-l" class="validate" name="address">
                            <label for="address-l">DOMICILIO</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select name="" id="denom">
                                <option value="" disabled selected>Repartición</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <select name="" id="sellers">
                                <option value="" disabled selected>Vendedor</option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6 l6 center-align">
                            <select name="" id="states">
                                <option value="" disabled selected>Estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="modal-footer col s12 m6 l6" style="padding-top: 20px !important;">
                            <a href="#!" class="btn right client-update blue darken-2">Aceptar</a>
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

                <!-- INFORMACION DEL CLIENTE -->
                <div class="row span-row">
                    <h5 class="col s11 m11 l11 margin-h5">INFORMACION DEL CLIENTE</h5>
                    <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                    <div class="col s12 m12 l12 divider" style="margin-bottom: 10px !important;"></div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>LEGAJO: </strong></span>
                        <span class="s-legajo"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>NOMBRE: </strong></span>
                        <span class="s-nombre"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>DNI: </strong></span>
                        <span class="s-dni"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>CBU: </strong></span>
                        <span class="s-cbu"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>TELÉFONO: </strong></span>
                        <span class="s-tel"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>DOMICILIO: </strong></span>
                        <span class="s-domicilio"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description ">
                        <span><strong>DENOMINACIÓN: </strong></span>
                        <span class="s-denominacion"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>VENDEDOR: </strong></span>
                        <span class="s-vendedor"></span>
                    </div>
                    <div class="col s12 m6 l6 offset-m3 offset-l3 padding-description">
                        <span><strong>ESTADO: </strong></span>
                        <span class="s-estado"></span>
                    </div>
                    <div class="modal-footer col s12 m6 l6 offset-m3 offset-l3">
                        <a href="#!" class="btn client-edit orange darken-2">Editar</a>
                    </div>
                </div>
                <!-- FIN INRMACION DEL CLIENTE -->
            </div>
        </div>
        <!-- FIN MODAL INFORMACION - EDICION -->

        <!-- MODAL MOVIMIENTOS -->
        <div id="movement-modal" class="modal">
            <div class="modal-content">
                <div class="row">
                    <h5 class="col s11 m11 l11 margin-h5">MOVIMIENTOS DEL CLIENTE</h5>
                    <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                    <div class="col s12 m12 l12 divider" style="margin-bottom: 20px !important;"></div>
                    <div class="col s12 m12 l12">
                        <table class="highlight responsive-table client-movements">
                            <thead>
                                <tr>
                                    <th>Periodo</th>
                                    <th>Saldo</th>
                                    <th>Importe</th>
                                    <th>Cobrado</th>
                                    <th>Cuotas</th>
                                    <th>Cuot/Pend.</th>
                                    <th>Conv/Cobro</th>
                                    <th>Suc.</th>
                                    <th>Prod.</th>
                                    <th>Rech.</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL MOVIMIENTOS -->

        <!-- MODAL OBSERVACIONES -->
        <div id="observation-modal" class="modal">
            <div class="modal-content">
                <div class="row form-obs hide">
                    <form action="">
                        <a href="#" class="obs-show col s1 m1 l1 margin-a"><i class="material-icons prefix" style="color: #000 !important;">arrow_back</i></a>
                        <h5 class="col s11 m11 l11 margin-h5">OBSERVACIÓN DEL CLIENTE</h5>
                        <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                        <div class="col s12 m12 l12 divider" style="margin-bottom: 20px !important;"></div>
                        <div class="col s12 m8 l8 offset-m2 offset-l2 input-field">
                            <textarea name="observation" id="textareaObserv" class="materialize-textarea"></textarea>
                            <label for="textareaObserv">Observación</label>
                        </div>
                        <div class="modal-footer col s12 m12 l12" style="padding-top: 30px !important;">
                            <a href="#!" class="btn right newObs blue darken-2">Crear</a>
                            <div class="preloader-wrapper hide small right active">
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
                <div class="row table-obs">
                    <h5 class="col s11 m11 l11 margin-h5">OBSERVACIONES DEL CLIENTE</h5>
                    <a class="col s1 m1 l1 right modal-close margin-a"><i class="material-icons" style="color: #000 !important;">close</i></a>
                    <div class="col s12 m12 l12 divider" style="margin-bottom: 20px !important;"></div>
                    <div class="col s12 m12 l12">
                        <table class="highlight responsive-table client-obs">
                            <thead>
                                <tr>
                                    <th>Observación</th>
                                    <th>Fecha</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer right" style="padding-top: 20px !important;">
                        <a href="#!" class="btn obs-new blue darken-2">Nueva</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL OBSERVACIONES -->
    </div>

    <script>
        // Variables
         var paramLeg;
         var paramObs;
         var selectedDenom;
         var selectedSeller;
         var selectedState;
         var selectedRep = 'all';
         var selectedSell = 'all';
         var selectedStates = 'all';
        // 
        $(document).ready(function () {
            getClients();
            search();
            $("#denom").change(function(){
                selectedDenom = $(this).children("option:selected").val();
                console.log(selectedDenom);
            });
            $("#sellers").change(function(){
                selectedSeller = $(this).children("option:selected").val();
                console.log(selectedSeller);
            });
            $("#states").change(function(){
                selectedState = $(this).children("option:selected").val();
                console.log(selectedState);
            });
            $("#rep").change(function(){
                selectedRep = $(this).children("option:selected").val();
                console.log(selectedRep);
                getClients();
            });
            $("#sell").change(function(){
                selectedSell = $(this).children("option:selected").val();
                console.log(selectedSell);
                getClients();
            });
            $("#state").change(function(){
                selectedStates = $(this).children("option:selected").val();
                console.log(selectedStates);
                getClients();
            });
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/distributions",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].CodReparticion}">${rows[i].Denominacion}</option>
                            `
                        );
                    }    
                    $('#rep').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/sellers",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `
                            <option value="${rows[i].CodVendedor}">${rows[i].ApellidoNombreV}</option>
                            `
                        );
                    }    
                    $('#sell').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/distributions",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `<option value="${rows[i].CodReparticion}">${rows[i].Denominacion}</option>`
                        );
                    }    
                    $('#denom').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/sellers",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `<option value="${rows[i].CodVendedor}">${rows[i].ApellidoNombreV}</option>`
                        );
                    }    
                    $('#sellers').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
        });
        // 
        function getClients(){
            // 
            var url = "http://localhost/mutualasn-api/public/customers/get/" + selectedRep + '/' + selectedStates + '/' + selectedSell;
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
                    `<tr class="content" clientID="${row[i].Legajo}">
                    <td>${row[i].Legajo}</td> 
                    <td>${row[i].ApellidoNombreC}</td> 
                    <td>${row[i].DNI}</td> 
                    <td>${row[i].CBU}</td> 
                    <td>${row[i].Denominacion}</td> 
                    <td><a href="#description-modal" class="btn  teal darken-4 description right modal-trigger"><i class="material-icons">description</i></a></td> 
                    <td><a href="#movement-modal" class="btn blue darken-4 movement right modal-trigger"><i class="material-icons">assignment</i></a></td> 
                    <td><a href="#observation-modal" class="btn orange darken-4 observation right modal-trigger"><i class="material-icons">library_books</i></a></td> 
                    </tr>`
                    );
                }  
                $('.client-table>tbody').html(html.join(''));
                // 
                $('.description').click(function (e) { 
                    e.preventDefault();
                    var element = $(this)[0].parentElement.parentElement;
                    paramLeg = $(element).attr('clientID')
                    getClientByID(paramLeg);
                });
                $('.movement').click(function (e) { 
                    e.preventDefault();
                    var element = $(this)[0].parentElement.parentElement;
                    paramLeg = $(element).attr('clientID')
                    getMovements(paramLeg);
                });
                $('.observation').click(function (e) { 
                    e.preventDefault();
                    var element = $(this)[0].parentElement.parentElement;
                    paramLeg = $(element).attr('clientID');
                    getObservations(paramLeg);
                });
                // 
                $('select').formSelect();
                $('.modal').modal();
                M.textareaAutoResize($('#textareaObserv'));
                // 
            },
                error: function(){
                    console.log('error');
                }
            });
        }
        // 
        function getClientByID(leg){
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/customers/getbyid/" + leg,
                dataType: "json",
                success: function (response) {
                    var data = response.result;
                    var estado;
                    var cbu;
                    var tel;
                    var domicilio;
                    if(data.Estado == "1"){
                        estado = 'Activo';
                    }else{
                        estado = 'Inactivo';
                    }
                    if(data.CBU == null || data.CBU == ""){
                        cbu = 'Sin asignar';
                    }else{
                        cbu = data.CBU;
                    }
                    if(data.telefono == null || data.telefono == ""){
                        tel = 'Sin asignar';
                    }else{
                        tel = data.telefono;
                    }
                    if(data.domicilio == null || data.domicilio == ""){
                        domicilio = 'Sin asignar';
                    }else{
                        domicilio = data.domicilio;
                    }
                    $('.s-legajo').html(data.Legajo);
                    $('.s-nombre').html(data.ApellidoNombreC);
                    $('.s-dni').html(data.DNI);
                    $('.s-cbu').html(cbu);
                    $('.s-tel').html(tel);
                    $('.s-domicilio').html(domicilio);
                    $('.s-denominacion').html(data.Denominacion);
                    $('.s-vendedor').html(data.ApellidoNombreV);
                    $('.s-estado').html(estado);

                    $('input[name="nleg"]').val(data.Legajo);
                    $('input[name="name"]').val(data.ApellidoNombreC);
                    $('input[name="dni"]').val(data.DNI);
                    $('input[name="cbu"]').val(data.CBU);
                    $('input[name="tel"]').val(data.telefono);
                    $('input[name="address"]').val(data.domicilio);
                    $('input[name="denom"]').val(data.Denominacion);
                    $('input[name="seller"]').val(data.ApellidoNombreV);
                    $('input[name="state"]').val(estado);

                    selectedDenom = data.CodReparticion;
                    selectedSeller = data.CodVendedor;
                    selectedState = data.Estado;
                    M.updateTextFields();
                }
            });
        }
        //
        $('.btn-clean').click(function (e) { 
            e.preventDefault();
            selectedRep = 'all';
            selectedSell = 'all';
            selectedStates = 'all';
            getClients();
        });
        //
        function getMovements(leg){
            var params = leg + "/all/all"
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/customers/movements/" + params,
                dataType: "json",
                success: function (response) {
                    console.log(response.result);
                    let row = response.result;
                    let html = [];
                    for (let i=0; i < row.length; i++){
                    var type = row[i].Tipo;
                    if (type == "DEBITO") {
                        type = type + ' ' + `<i class="material-icons icon-green tiny">check</i>`
                    } else if (type == "NO ENVIADO"){
                        type = type + ' ' + `<i class="material-icons icon-orange tiny">priority_high</i>`
                    }else {
                        type = type + ' ' + `<i class="material-icons icon-red tiny">clear</i>`
                    }
                    html.push(
                    `<tr">
                    <td>${row[i].Periodo}</td> 
                    <td>${row[i].Saldo}</td> 
                    <td>${row[i].Importe}</td> 
                    <td>${row[i].Cobrado}</td> 
                    <td>${row[i].Cuotas}</td>  
                    <td>${row[i].CuotasPendientes}</td>  
                    <td>${row[i].ConvenioCobro}</td>  
                    <td>${row[i].NombreSuc}</td>  
                    <td>${row[i].Descripcion}</td>  
                    <td>${row[i].Motivo}</td>  
                    <td>${type}</td>  
                    </tr>`
                    );
                }  
                $('.client-movements>tbody').html(html.join(''));
                }
            });
        }
        // 
        function getObservations(leg){
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/customers/observations/list/" + leg,
                dataType: "json",
                success: function (response) {
                    console.log(response.result);
                    let row = response.result;
                    let html = [];
                    for (let i=0; i < row.length; i++){
                    html.push(
                    `<tr obsID="${row[i].id}">
                        <td>${row[i].texto}</td> 
                        <td>${row[i].fecha}</td> 
                        <td><a href="#" class="btn red darken-4 obs-delete"><i class="material-icons">delete</i></a></td> 
                        <td></td> 
                    </tr>`
                    );
                }  
                $('.client-obs>tbody').html(html.join(''));
                $('.obs-delete').click(function (e) { 
                    e.preventDefault();
                    var element = $(this)[0].parentElement.parentElement;
                    paramObs = $(element).attr('obsID')
                    deleteObs(paramObs)
                });
                },
                error: function(){
                    console.log('error');
                }
            });
        }

        // 
        $('.newObs').click(function (e) { 
            e.preventDefault();
            var today = new Date();
            var getdate = today.getDate();
            if(getdate <= 9){
                getdate = '0' + getdate;
            }
            var getmonth = today.getMonth() + 1;
            if(getmonth <= 9){
                getmonth = '0' + getmonth;
            }
            var gethour = today.getHours();
            if(gethour <= 9){
                gethour = '0' + gethour;
            }
            var getminute = today.getMinutes();
            if(getminute <= 9){
                getminute = '0' + getminute;
            }
            var getsecond = today.getSeconds();
            if(getsecond <= 9){
                getsecond = '0' + getsecond;
            }
            var date = today.getFullYear() + '-' + (getmonth) + '-' + getdate;
            var hour = gethour + ':' + getminute + ':' + getsecond;
            var moment = date + ' ' + hour;
            var text = $("textarea[name=observation]").val();
            $('.newObs').addClass('hide');
            $('.preloader-wrapper').removeClass('hide');
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/customers/observations/create/" + paramLeg,
                data: {
                    "texto": text
                },
                dataType: "json",
                success: function (response) {
                    $('.newObs').removeClass('hide');
                    $('.preloader-wrapper').addClass('hide');
                    M.toast({html: '¡Observación creada!'});
                    getObservations(paramLeg);
                    $("textarea[name=observation]").val('');
                }, 
                error: function(){
                    M.toast({html: 'Error al crear observación'});
                    $('.newObs').removeClass('hide');
                    $('.preloader-wrapper').addClass('hide');
                }
            });
        });
        // 
        $('.client-update').click(function (e) { 
            e.preventDefault();
            $('.client-update').addClass('hide');
            $('.preloader-update').removeClass('hide');
            var newLeg = $('input[name="nleg"]').val();
            var data = {
                'legajo': $('input[name="nleg"]').val(),
                'apellidonombre': $('input[name="name"]').val(),
                'dni': $('input[name="dni"]').val(),
                'telefono': $('input[name="tel"]').val(),
                'domicilio': $('input[name="address"]').val(),
                'cbu': $('input[name="cbu"]').val(),
                'reparticion': selectedDenom,
                'vendedor': selectedSeller,
                'estado': selectedState,
                'id': paramLeg
            };
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/customers/update",
                data: data,
                dataType: "json",
                success: function (response) {
                    $('.client-update').removeClass('hide');
                    $('.preloader-update').addClass('hide');
                    M.toast({html: '¡Cliente actualizado!'});
                    getClientByID(newLeg);
                },
                error: function(){
                    M.toast({html: 'Error al actualizar cliente'});
                    $('.client-update').removeClass('hide');
                    $('.preloader-update').addClass('hide');
                }
            });
        });
        // 
        function deleteObs(id){
            $.ajax({
                type: "POST",
                url: "http://localhost/mutualasn-api/public/customers/observations/delete/" + id,
                dataType: "json",
                success: function (response) {
                    M.toast({html: '¡Observación eliminada!'});
                    getObservations(paramLeg);
                },
                error: function(){
                    M.toast({html: 'Error al eliminar observación'});
                }
            });
        }
        // 
        function search(){
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".content").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        }
        // 
        $('.client-edit').click(function (e) { 
            e.preventDefault();
            $('.span-row').addClass('hide');
            $('.form-row').removeClass('hide');
        });
        $('.client-show').click(function (e) { 
            e.preventDefault();
            $('.form-row').addClass('hide');
            $('.span-row').removeClass('hide');
        });
        $('.obs-show').click(function (e) { 
            e.preventDefault();
            $('.form-obs').addClass('hide');
            $('.table-obs').removeClass('hide');
        });
        $('.obs-new').click(function (e) { 
            e.preventDefault();
            $('.table-obs').addClass('hide');
            $('.form-obs').removeClass('hide');
        });
    </script>
</body>
</html>