<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISOGAD</title>
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="{{'bootstrap/css/bootstrap.min.css'}}">
</head>
<body>
    <head>
        <div class="row" style="color: #7A869A;font-size: 10px; padding-left: 80%">
            <p style="text-align: center">Fecha: <br>{{ $fecha }} </p>
        </div>
        <img src="img/reporte_unasam.jpg" alt="" style="width: 7%;height: 5%; margin-top: -10%">
    </head>
    <div class="col-md-8 text-center" style="color: #7A869A;font-size: 18px;margin-top: -10%">
        <h2>Reporte de Equipos</h2>
    </div>
    <hr>
    <div class="container mt-4">
       
        <div class="row">
            <div class="col-md-4">
                <div class="mb-4 d-flex justify-content-end" style="color: #7A869A;font-size: 14px">
                   <p >Responsable: {{$responsable}} &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Celular: {{$celular}} </p>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table" style="color: #7A869A;font-size: 14px">
                    <caption>Lista de Equipos</caption>
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                            <th class="text-center">Serie</th>
                            <th class="text-center">Cod. Patrimonial</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Marca</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($operacion_equipos as $key => $oquipos)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $oquipos->serie }}</td>
                                <td>{{ $oquipos->cod_patrimonial }}</td>
                                <td>{{ $oquipos->cat }}</td>
                                <td>{{ $oquipos->nombre }}</td>
                               
                            </tr>

                        @endforeach
                    </tbody> 
                  </table>
            </div>
        </div>
    </div>
    
    <script src="{{'bootstrap/js/bootstrap.min.js'}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>