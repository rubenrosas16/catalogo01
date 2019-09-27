<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Catalogo - Ruben Rosas</title>
    <link rel="icon" type="image/png" href="{{url('/icono.png')}}">
    <link href="{{url('/assets/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}" rel="stylesheet"> 
    <link href="{{url('/assets/estiloBase.css')}}" rel="stylesheet"> 
</head>
<body>

<div id = "contenido" class="contenedor">
    <center><h1 class="titulo">Listado</h1></center>
    <br>
    <br>
    <button onclick="traerListado();" type="submit" data-loading-text="<div class='spinner-border spinner-border-sm'></div> Cargando" class="btnCarga btn btn-primary" data-valor-text="Recargar">Recargar</button>    
    <br>
    <br>
    <div id="listado"></div>
</div>

<script src="{{url('/assets/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('/assets/popper/popper-1.14.7.min.js')}}"></script>
<script src="{{url('/assets/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/scriptBase.js')}}"></script>
</body>
</html>