<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Informes</title>
    <style>
        .container{
            margin-left: 265px !important;
        }
        .margin-b{
            margin-top: 30px !important;
        }
        .table-movement tbody tr td {
            font-size: 13px;
        }
        .table-movement tr {
            font-size: 12px;
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
            <div class="col s12 m10 l10">
                <h4>Informes</h4>
            </div>
            <div class="col s12 m1 l1 margin-b">
                <a href="#" class="btn toExcel right teal darken-3">Excel</a>
            </div>
            <div class="col s12 m1 l1 margin-b">
                <a href="#" class="btn toPDF right red darken-4">PDF</a>
            </div>
        </div>
        <div class="row">
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
                    <select name="" id="sell">
                        <option value="0" disabled selected>Vendedor</option>
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
            <div class="input-field col s12 m4 l4 search">
                <input id="search" type="text" class="validate">
                <label for="search">Buscar</label>
            </div>
            <div class="col s12 m8 l8 margin-b">
                <a href="#" class="btn btn-clean right blue-grey darken-4">Limpiar</a>
            </div>
            <div class="col s12 m12 l12 table-movement">
                    <table class="highlight responsive-table movement-table">
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
    <script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    <script src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf-autotable@3.5.3/dist/jspdf.plugin.autotable.js"></script>
    <script>
        var selectedSell = 'all';
        var selectedPer = 'all';
        var selectedSuc = 'all';
        var selectedProd = 'all';
        var selectedMov = 'all';
        var selectedTipRech = "";
        // 
        $(document).ready(function () {
            getReports();
            search();
            $("#per").change(function(){
                selectedPer = $(this).children("option:selected").val();
                getReports();
            });
            $("#suc").change(function(){
                selectedSuc = $(this).children("option:selected").val();
                console.log(selectedSuc);
                getReports();
            });
            $("#prod").change(function(){
                selectedProd = $(this).children("option:selected").val();
                getReports();
            });
            $("#sell").change(function(){
                selectedSell = $(this).children("option:selected").val();
                getReports();
            });
            $("#mov").change(function(){
                selectedMov = $(this).children("option:selected").val();
                console.log(selectedMov);
                getReports();
            });
            $("#mot").change(function(){
                selectedTipRech = '/' + $(this).children("option:selected").val();
                console.log(selectedTipRech);
                getReports();
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
                    $('select').formSelect();
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
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/sellers",
                dataType: "json",
                success: function (response) {
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
        function getReports(){
            url = "http://localhost/mutualasn-api/public/movements/get/" + selectedPer + "/" + selectedSuc + "/" + selectedProd + "/" + selectedSell + "/" + selectedMov + selectedTipRech;
            console.log(url);
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
        $('.toExcel').click(function (e) { 
            e.preventDefault();
            $('.movement-table').table2excel({
                // exclude:
                name: "Reporte",
                filename: "Reporte" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
                fileext: ".xls"
            });
        });
        $('.toPDF').click(function(event) {
          var pdfsize = 'a3';
          var doc = new jsPDF('l', 'pt', pdfsize)
          doc.autoTable({ 
                html: '.movement-table',  
                startY: 60,
                styles: {
                fontSize: 9.5,
                cellWidth: 'wrap'
                },
                columnStyles: {
                1: {columnWidth: 'auto'}
                }
            })
          doc.save("Reporte" + new Date().toISOString().replace(/[\-\:\.]/g, ""))
        });
        $('.btn-clean').click(function (e) { 
            e.preventDefault();
            selectedSell = 'all';
            selectedPer = 'all';
            selectedSuc = 'all';
            selectedProd = 'all';
            selectedMov = 'all';
            selectedTipRech = "";
            getReports();
        });
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