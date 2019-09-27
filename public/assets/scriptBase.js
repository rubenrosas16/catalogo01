$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.btnCarga').click(function() {
    var btn = $(this);
    btn.html(btn.data("loading-text")); setTimeout(function() {
        btn.html(btn.data("valor-text"));
      }, 1000);
});

traerListado();
setInterval(traerListado, 10000);


function traerListado(){

    $.ajax({
        url: "./listado"
      })
        .done(function( data ) {
            $("#listado").html(data);
        });
}