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
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="">
                        <option value="" disabled selected>Sucursal</option>
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="">
                        <option value="" disabled selected>Producto</option>
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3">
                <div class="input-field">
                    <select name="" id="">
                        <option value="" disabled selected>Tipo de movimiento</option>
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                        <option value="4"></option>
                        <option value="5"></option>
                    </select>
                </div>
            </div>
            <div class="col s12 m3 l3">
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
        </div>
        <div class="row">
            <div class="col s12 m11 l11">
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
            <div class="col s12 m1 l1">
                <button class="btn excelUpload black">Subir</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
        $("#fileUpload").change(function(evt){
            var selectedFile = evt.target.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                var data = event.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
            workbook.SheetNames.forEach(function(sheetName) {
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName], {raw: false});
                var json_object = JSON.stringify(XL_row_object);
                // document.getElementById("jsonObject").innerHTML = json_object;
                console.log(XL_row_object);
                let rows = XL_row_object;
                let html = [];
                for (let i=0; i < rows.length; i++){
                    html.push(
                    `<tr>
                    <td> ${rows[i].Nombre} </td> 
                    <td> ${rows[i].Legajo} </td> 
                    <td> ${rows[i].DNI} </td> 
                    <td> ${rows[i].Periodo} </td> 
                    <td> ${rows[i].Alta} </td> 
                    </tr>`
                    );
                }    
                    // <td> <input type="number" class="cant form-control" placeholder="Cantidad"> </td>
                $('table>tbody').html(html.join(''));
                })
            };
            reader.onerror = function(event) {
                console.error("File could not be read! Code " + event.target.error.code);
            };
            reader.readAsBinaryString(selectedFile);
        });
    </script>
</body>
</html>