$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
    console.log('Pagina cargada');
    traerListado();
    setInterval(traerListado, 10000);
});

$('.btnCarga').click(function() {
    var btn = $(this);
    cargarBoton(btn);
});

function restablecerBoton(btn){
    btn.html(btn.data("valor-text"));
    console.log('restablecer boton');
}

function cargarBoton(btn){
    btn.html(btn.data("loading-text"));
    console.log('modificar boton');
}

function traerListado(){
    $.ajax({
        url: "./listado"
      })
        .done(function( data ) {
            $("#listado").html(data);
            restablecerBoton($("#btnRecarga"));
        });
}

function guardarProducto(){
    cargarBoton($("#btnRecarga")); 
    var formData = new FormData(document.getElementById("formNuevo"));
    $.ajax({
        type: "POST",
        url: "./nuevoProducto",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
	     processData: false
      }).done(function( data ) {
          if (data != 'correcto'){
            console.log(data);
            alert(data);
          }else{
            $('#modalNuevo').modal('hide');
            document.getElementById("formNuevo").reset();
          }  
          traerListado();       
    });   
}

function borrar(id){
    if (confirm("¿Borrar el producto?")){
        cargarBoton($("#btnRecarga")); 
        $.ajax({
            url: "./borrarProducto?id="+id
          })
            .done(function( data ) {
                $("#listado").html(data);
                if (data != 'correcto'){
                    console.log(data);
                    alert(data);
                }
                traerListado();
            }); 
    }
}

function traerEditar(id){
    $.ajax({
        url: "./buscarProducto?id="+id
        })
        .done(function( data ) {
            try{
                var producto = JSON.parse(data);
                $('#modalEditar').modal('show');
                $('input[name=nombreEditar]').val(producto.nombre);
                $('input[name=descripcionEditar]').val(producto.descripcion);
                $("#imagenMostrarEditar").attr("src", "./images/"+producto.imagen);     
                $("#idEditar").val(id); 
                console.log($("#idEditar").val());                   
            }catch(ex){
                console.log(ex);
                alert(data);
            }              
        }); 
}

function guardarEditar(){
    cargarBoton($("#btnRecarga")); 
    var formData = new FormData(document.getElementById("formEditar"));
    $.ajax({
        type: "POST",
        url: "./actualizarProducto",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
	    processData: false
      }).done(function( data ) {
          if (data != 'correcto'){
            console.log(data);
            alert(data);
          }else{
            $('#modalEditar').modal('hide');
            document.getElementById("formEditar").reset();
          }  
          traerListado();       
    }); 
}

function loadFile(event) {
    console.log('cambiando imagen');
    var imagenMostrarEditar = document.getElementById('imagenEditar');
    imagenMostrarEditar.src = URL.createObjectURL(event.target.files[0]);
}
