<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
Use Log;

class ControllerProduct extends Controller
{
    //
    public function get_all(){
      return Producto::all();
    }

    // funcion de insertar
    public function create(Request $request){

      // inserta los datos
      Producto::insert([
        'titulo' => $request->input('titulo'),
        'descripcion' => $request->input('descripcion'),
        'precio' => $request->input('precio')
      ]);

      // respesta de JSON
      $response['message'] = "Guardo exitosamente";
      $response['success'] = true;

      return $response;
    }

    public function update(Request $request){

      // inserta los datos
      Producto::where('id_producto',$request->input('id_producto'))->
      update([
        'titulo' => $request->input('titulo'),
        'descripcion' => $request->input('descripcion'),
        'precio' => $request->input('precio')
      ]);

      // respesta de JSON
      $response['message'] = "Actualizo exitosamente";
      $response['success'] = true;

      return $response;

    }

    public function delete(Request $request){

      // Eliminar
      Producto::where('id_producto',$request->input('id_producto'))->delete();
      // respesta de JSON
      $response['message'] = "Elimino exitosamente";
      $response['success'] = true;

      return $response;
    }

}
