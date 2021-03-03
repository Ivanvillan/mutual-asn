<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.3/xlsx.full.min.js"></script>
    <title>Mutual ASN | Ingreso de planilla</title>
</head>
<body>
    <?php include('../header/header.php') ?>
    <div class="container">
        <div class="row">
            <h4>INGRESO DE DATOS</h4>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="offices">
                        <option value="0" disabled selected>Sucursal</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="products">
                        <option value="0" disabled selected>Producto</option>
                    </select>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="input-field">
                    <select name="" id="Movement">
                        <option value="" disabled selected>Tipo de movimiento</option>
                        <option value="1">Débito</option>
                        <option value="2">Rechazo</option>
                        <option value="3">No Enviado</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m5 l5">
                <form action="#">
                    <div class="file-field input-field">
                        <div class="btn black">
                            <span>Planilla</span>
                            <input type="file" id="fileUpload" accept=".xls,.xlsx">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col s12 m1 l1 right">
                <button class="btn excelUpload black">Subir</button>
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
        <div class="row">
            <div class="col s12 m12 l12">
                <table class="highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Legajo</th>
                            <th>DNI</th>
                            <th>Periodo</th>
                            <th>Alta</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        var result = {"rows": []};
        var selectedProduct;
        var selectedOffice;
        var selectedMov;
        $(document).ready(function(){
            getProducts();
            $("#products").change(function(){
                selectedProduct = $(this).children("option:selected").val();
                console.log(selectedProduct);
            });
            $("#offices").change(function(){
                selectedOffice = $(this).children("option:selected").val();
                console.log(selectedOffice);
            });
            $("#Movement").change(function(){
                selectedMov = $(this).children("option:selected").val();
                console.log(selectedMov);
            });
        });
        // 
        function getProducts(){
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/products",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `<option value="${rows[i].CodProducto}">${rows[i].Descripcion}</option>`
                        );
                    }    
                    $('#products').append(html.join(''));
                },
                error: function(){
                    console.log('error');
                }
            });
            // 
            $.ajax({
                type: "GET",
                url: "http://localhost/mutualasn-api/public/entities/get/offices",
                dataType: "json",
                success: function (response) {
                    let rows = response.result;
                    let html = [];
                    for (let i=0; i < rows.length; i++){
                        html.push(
                            `<option value="${rows[i].CodSucursal}">${rows[i].NombreSuc}</option>`
                        );
                    }    
                    $('#offices').append(html.join(''));
                    $('select').formSelect();
                },
                error: function(){
                    console.log('error');
                }
            });
            // 
        }
        // 
        $("#fileUpload").change(function(evt){
            var selectedFile = evt.target.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                var data = event.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
            workbook.SheetNames.forEach(function(sheetName) {
                XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName], {raw: false});
                let row = XL_row_object;
                let html = [];
                for (let i=0; i < row.length; i++){
                    html.push(
                    `<tr>
                    <td>${row[i].Nombre}</td> 
                    <td>${row[i].Legajo}</td> 
                    <td>${row[i].DNI}</td> 
                    <td>${row[i].Periodo}</td> 
                    <td>${row[i].Alta}</td> 
                    </tr>`
                    );
                    result.rows[i] = {"rep": row[i].Rep ?? '0', "solicitud": row[i].Solicitud ?? '0', "periodo": row[i].Periodo ?? '0',
                        "nombre": row[i].Nombre ?? '0', "legajo": row[i].Legajo ?? '0', "alta": row[i].Alta ?? '0', "saldo": row[i].Saldo ?? '0',
                        "importe": row[i].Importe ?? '0', "cobrado": row[i].Cobrado ?? '0', "cuotas": row[i].Cuotas ?? '0',
                        "cuotaspendientes": row[i].CuotasPendientes ?? '0', "conveniocobro": row[i].ConvenioCobro ?? '0', 
                        "dni": row[i].DNI ?? '0', "cbu": row[i].CBU ?? '0', "rech": row[i].Rech ?? '0'
                    };
                }    
                $('table>tbody').html(html.join(''));
                })
            };
            reader.onerror = function(event) {
                console.error("File could not be read! Code " + event.target.error.code);
            };
            reader.readAsBinaryString(selectedFile);
        });
        // 
        $('.excelUpload').click(function (e) { 
            e.preventDefault();
            $('.excelUpload').addClass('hide');
            $('.preloader-wrapper').removeClass('hide');
            var url = "http://localhost/mutualasn-api/public/movements/register/"
            $.ajax({
                type: "POST",
                url: url + selectedOffice + "/" + selectedProduct + "/" + selectedMov,
                data: result,
                dataType: "json",
                success: function (response) {
                    M.toast({html: 'Información cargada correctamente'});
                    $('.excelUpload').removeClass('hide');
                    $('.preloader-wrapper').addClass('hide');
                },
                error: function(){
                    M.toast({html: 'Error al cargar información, compruebe los datos'});
                    $('.excelUpload').removeClass('hide');
                    $('.preloader-wrapper').addClass('hide');
                }
            });
        });
        // 
    </script>
</body>
</html>