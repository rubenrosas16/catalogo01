@if(count($productos) == 0)
<center><strong style="color:red;">No hay productos, registra uno.</strong></center>
@else
@foreach($productos as $prod)
  <div class="card" style="padding:10px; display: inline-block">
    <img style="width: 300px; height: 300px;" src="{{url('/images/'.$prod->imagen)}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{$prod->nombre}}</h5>
      <p class="card-text">{{$prod->descripcion}}</p>
      <button onClick="traerEditar({{$prod->id}});" class="btn btn-primary">Editar</button>
      <button onClick="borrar({{$prod->id}});" class="btn btn-danger">Borrar</button>
    </div>
  </div>
@endforeach
@endif