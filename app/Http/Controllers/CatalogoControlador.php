<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class CatalogoControlador extends Controller
{
    public function catalogo(){
        return view('catalogo');
    }

    public function listado(){
        $productos = Productos::all();


        return view('listado');
    }

    public function nuevoProducto(Request $request){
        //https://www.youtube.com/watch?v=1Z7oson-G8M
        if($request->has_file('imagen')){
            $file = $request->file('imagen');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/'.$name);
        }
        
        return $name;
    }

}
