<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
Use Log;

class ControllerCliente extends Controller
{
    //
     //
     public function get_all(){
          return Cliente::all();
      }
  
      // funcion de insertar
      public function create(Request $request){
  
        // inserta los datos
        Cliente::insert([
          'nombre' => $request->input('nombre'),
          'domicilio' => $request->input('domicilio'),
          'telefono' => $request->input('telefono'),
          'email' => $request->input('email')
        ]);
  
        // respesta de JSON
        $response['message'] = "Guardo exitosamente";
        $response['success'] = true;
  
        return $response;
      }
  
      public function update(Request $request){
  
        // inserta los datos
        Cliente::where('id_cliente',$request->input('id_cliente'))->
        update([
            'nombre' => $request->input('nombre'),
            'domicilio' => $request->input('domicilio'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email')
        ]);
  
        // respesta de JSON
        $response['message'] = "Actualizo exitosamente";
        $response['success'] = true;
  
        return $response;
  
      }
  
      public function delete(Request $request){
  
        // Eliminar
        Cliente::where('id_cliente',$request->input('id_cliente'))->delete();
        // respesta de JSON
        $response['message'] = "Elimino exitosamente";
        $response['success'] = true;
  
        return $response;
      }
}
