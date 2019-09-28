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
    <button id="btnRecarga" onclick="traerListado();" data-loading-text="<div class='spinner-border spinner-border-sm'></div> Cargando" class="btnCarga btn btn-primary" data-valor-text="Recargar">Recargar</button>    
    <button onclick="traerListado();" data-toggle="modal" data-target="#modalNuevo" class="btn btn-primary">Nuevo</button>    
    <br>
    <br>
    <div id="listado"></div>
</div>

<!-- Modales -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="modalNuevoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalNuevoLabel">Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formNuevo" name="formNuevo">

      {{Form::label('nombre', 'Nombre')}}
      {{Form::text('nombre', '', array('class' => 'form-control'))}}
      <br>
      {{Form::label('descripcion', 'Descripción')}}
      {{Form::text('descripcion', '', array('class' => 'form-control'))}}
      <br>
      {{Form::label('imagen', 'Imagen')}}
      <br>      
      <img id="imagenMostrarNueva" name="imagenMostrarNueva" style="width: 100px; height: 100px;">
      <br>
      <input type="file" name="imagen" id="imagen" onchange="document.getElementById('imagenMostrarNueva').src = window.URL.createObjectURL(this.files[0])">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onClick="guardarProducto();" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form id="formEditar" name="formEditar">
      <input type="hidden" id="idEditar" name="idEditar" value="0">
      {{Form::label('nombreEditarlbl', 'Nombre')}}
      {{Form::text('nombreEditar', '', array('class' => 'form-control'))}}
      <br>
      {{Form::label('descripcionlbl', 'Descripción')}}
      {{Form::text('descripcionEditar', '', array('class' => 'form-control'))}}
      <br>
      {{Form::label('imagenlbl', 'Imagen')}}
      <br>
      <img id="imagenMostrarEditar" name="imagenMostrarEditar" style="width: 100px; height: 100px;">
      <br>
      <input type="file" name="imagenEditar" id="imagenEditar" onchange="document.getElementById('imagenMostrarEditar').src = window.URL.createObjectURL(this.files[0])" >
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onClick="guardarEditar();" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>


<script src="{{url('/assets/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{url('/assets/popper/popper-1.14.7.min.js')}}"></script>
<script src="{{url('/assets/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/scriptBase.js')}}"></script>
</body>
</html>