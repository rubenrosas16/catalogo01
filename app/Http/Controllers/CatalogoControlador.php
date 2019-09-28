<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use View;
use File;
use Illuminate\Support\Str;

class CatalogoControlador extends Controller
{
    public function catalogo(){
        return view('catalogo');
    }

    public function listado(){
        $productos = Producto::all();
        return View::make('listado',compact('productos'));
    }

    public function nuevoProducto(Request $request){
        if(!isset($request->nombre)){
            return 'Ecribe el nombre';
        }
        if(!isset($request->descripcion)){
            return 'Ecribe la descripción';
        }
        if(!$request->hasFile('imagen')){
            return 'Selecciona la imagen';
        }
        $imagen = $request->file('imagen');
        $nombreImagen = time().$imagen->getClientOriginalName();

        if(!($this->endsWith($nombreImagen, '.jpg') ||
        $this->endsWith($nombreImagen, '.png') ||
        $this->endsWith($nombreImagen, '.jpeg') ||
        $this->endsWith($nombreImagen, '.bmp') )){
                return 'El formato de la imagen no es valido.';
        }

        $imagen->move(public_path().'\\images\\', $nombreImagen);
        
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->imagen = $nombreImagen;
        $producto->save();
        
        return 'correcto';
    }

    public function borrarProducto(Request $request){
        if( !isset($request->id) ){
            return 'proporciona el id';
        }
        $producto = Producto::find($request->id);      
        File::delete(public_path().'\\images\\'.$producto->imagen);    
        $producto->delete();
        return 'correcto';
    }

    function endsWith($haystack, $needle, $case=true) {
        return (bool) preg_match("/.*{$needle}$/" . (($case) ? "" : "i"), $haystack);
    }

    public function buscarProducto(Request $request){
        if( !isset($request->id) ){
            return 'proporciona el id';
        }
        $producto = Producto::find($request->id);
        //Regresamos un json
        return '{"id":"'.$producto->id.'", "nombre":"'.$producto->nombre.'", "descripcion":"'.$producto->descripcion.'", "imagen":"'.$producto->imagen.'"}';
    }

    public function actualizarProducto(Request $request){
        if( !isset($request->idEditar) ){
            return 'proporciona el id';
        }

        $producto = Producto::find($request->idEditar);

        if(!isset($producto)){
            return "El producto no existe";
        }

        if(!isset($request->nombreEditar)){
            return 'Ecribe el nombre';
        }

        $producto->nombre = $request->nombreEditar;

        if(!isset($request->descripcionEditar)){
            return 'Ecribe la descripción';
        }

        $producto->descripcion = $request->descripcionEditar;     

        if($request->hasFile('imagenEditar')){
        
            $imagen = $request->file('imagenEditar');
            $nombreImagen = time().$imagen->getClientOriginalName();

            if(!($this->endsWith($nombreImagen, '.jpg') ||
            $this->endsWith($nombreImagen, '.png') ||
            $this->endsWith($nombreImagen, '.jpeg') ||
            $this->endsWith($nombreImagen, '.bmp') )){
                    return 'El formato de la imagen no es valido.';
            }

            $imagen->move(public_path().'\\images\\', $nombreImagen);

            File::delete(public_path().'\\images\\'.$producto->imagen);

            $producto->imagen = $nombreImagen;
        }

        $producto->save();

        return 'correcto';
    }

}
