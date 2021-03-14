<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutual ASN | Inicio</title>
    <style>
        .container{
            margin-left: 300px !important;
        }
        select li a, select li span {
            color: #000;
        }
    </style>
</head>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="type">
                        <option value="" disabled selected>Filtro</option>
                        <option value="1">Cantidad</option>
                        <option value="2">Importe</option>
                        <option value="3">Cobrado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12">
                <h6>Sucursal 40</h6>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" class="data-40" id="cant-40"></canvas>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" class="hide" id="import-40"></canvas>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" class="hide" id="cob-40"></canvas>
            </div>
            <div class="col s12 m12 l12">
                <h6>Sucursal 59</h6>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" id="cant-59"></canvas>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" class="hide" id="import-59"></canvas>
            </div>
            <div class="col s12 m12 l12">
                <canvas  width="600" height="140" class="hide" id="cob-59"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>
        var selectedType = "1";
        var deb40;
        var debCant40;
        var debImport40;
        var debCob40;
        var rech40;
        var rechCant40;
        var rechImport40;
        var rechCob40;
        var noEnv40;
        var noEnvCant40;
        var noEnvImport40;
        var noEnvCob40;
        var deb59;
        var debCant59;
        var debImport59;
        var debCob59;
        var rech59;
        var rechCant59;
        var rechImport59;
        var rechCob59;
        var noEnv59;
        var noEnvCant59;
        var noEnvImport59;
        var noEnvCob59;

        $(document).ready(function () {
            $("#type").change(function(){
                selectedType = $(this).children("option:selected").val();
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/movements/resume/all/40/all/1",
                dataType: "json",
                success: function (response) {
                    deb40 = response.result[0];
                    console.log(deb40);
                    debCant40 = deb40.Cantidad;
                    debImport40 = deb40.Importe;
                    debCob40 = deb40.Cobrado;
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/mutualasn-api/public/movements/resume/all/40/all/2",
                        dataType: "json",
                        success: function (response) {
                            rech40 = response.result[0];
                            console.log(rech40);
                            rechCant40 = rech40.Cantidad;
                            rechImport40 = rech40.Importe;
                            rechCob40 = rech40.Cobrado;
                            $.ajax({
                                type: "GET",
                                url: "http://localhost/mutualasn-api/public/movements/resume/all/40/all/3",
                                dataType: "json",
                                success: function (response) {
                                    noEnv40 = response.result[0];
                                    console.log(noEnv40);
                                    noEnvCant40 = noEnv40.Cantidad;
                                    noEnvImport40 = noEnv40.Importe;
                                    noEnvCob40 = noEnv40.Cobrado;
                                    drawData40(debCant40, rechCant40, noEnvCant40, 'cant-40');
                                        $("#type").change(function(){
                                            if (selectedType == "1") {
                                                drawData40(debCant40, rechCant40, noEnvCant40, 'cant-40');
                                            }else if(selectedType == "2"){
                                                drawData40(debImport40, rechImport40, noEnvImport40, 'import-40');
                                            }else{
                                                drawData40(debCob40, rechCob40, noEnvCob40, 'cob-40');
                                            }
                                        });
                                        $('select').formSelect();
                                    }
                            });
                        }
                    });
                }
            });
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/movements/resume/all/59/all/1",
                dataType: "json",
                success: function (response) {
                    deb59 = response.result[0];
                    console.log(deb59);
                    debCant59 = deb59.Cantidad;
                    debImport59 = deb59.Importe;
                    debCob59 = deb59.Cobrado;
                    $.ajax({
                        type: "GET",
                        url: "http://localhost/mutualasn-api/public/movements/resume/all/59/all/2",
                        dataType: "json",
                        success: function (response) {
                            rech59 = response.result[0];
                            console.log(rech59);
                            rechCant59 = rech59.Cantidad;
                            rechImport59 = rech59.Importe;
                            rechCob59 = rech59.Cobrado;
                            $.ajax({
                                type: "GET",
                                url: "http://localhost/mutualasn-api/public/movements/resume/all/59/all/3",
                                dataType: "json",
                                success: function (response) {
                                    noEnv59 = response.result[0];
                                    console.log(noEnv59);
                                    noEnvCant59 = noEnv59.Cantidad;
                                    noEnvImport59 = noEnv59.Importe;
                                    noEnvCob59 = noEnv59.Cobrado;
                                    drawData59(debCant59, rechCant59, noEnvCant59, 'cant-59');
                                        $("#type").change(function(){
                                            if (selectedType == "1") {
                                                drawData59(debCant59, rechCant59, noEnvCant59, 'cant-59');
                                            }else if(selectedType == "2"){
                                                drawData59(debImport59, rechImport59, noEnvImport59, 'import-59');
                                            }else{
                                                drawData59(debCob59, rechCob59, noEnvCob59, 'cob-59');
                                            }
                                        });
                                        $('select').formSelect();
                                    }
                            });
                        }
                    });
                }
            });
        });
        function drawData40(dataDeb, dataRech, dataNoEnv, dataCanvas){
                if (selectedType == "1") {
                    $('#cant-40').removeClass('hide');
                    $('#cob-40').addClass('hide');
                    $('#import-40').addClass('hide');
                }else if(selectedType == "2"){
                    $('#cant-40').addClass('hide');
                    $('#import-40').removeClass('hide');
                    $('#cob-40').addClass('hide');
                }else{
                    $('#cant-40').addClass('hide');
                    $('#import-40').addClass('hide');
                    $('#cob-40').removeClass('hide');
                }
                var ctx = document.getElementById(dataCanvas).getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Débito', 'Rechazado', 'No enviado'],
                    datasets: [{
                        label: 'DATOS SUCURSAL 40',
                        data: [dataDeb, dataRech, dataNoEnv],
                        backgroundColor: [
                            'rgb(0,128,0,0.5)',
                            'rgb(255, 00, 00,0.5)',
                            'rgb(255,255,0,0.5)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
        function drawData59(dataDeb, dataRech, dataNoEnv, dataCanvas){
                if (selectedType == "1") {
                    $('#cant-59').removeClass('hide');
                    $('#cob-59').addClass('hide');
                    $('#import-59').addClass('hide');
                }else if(selectedType == "2"){
                    $('#cant-59').addClass('hide');
                    $('#import-59').removeClass('hide');
                    $('#cob-59').addClass('hide');
                }else{
                    $('#cant-59').addClass('hide');
                    $('#import-59').addClass('hide');
                    $('#cob-59').removeClass('hide');
                }
                var ctx = document.getElementById(dataCanvas).getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Débito', 'Rechazado', 'No enviado'],
                    datasets: [{
                        label: 'DATOS SUCURSAL 59',
                        data: [dataDeb, dataRech, dataNoEnv],
                        backgroundColor: [
                            'rgb(0,128,0,0.5)',
                            'rgb(255, 00, 00,0.5)',
                            'rgb(255,255,0,0.5)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    </script>
</body>
</html>