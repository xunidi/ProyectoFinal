<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pedido;
use Illuminate\Support\Facades\DB;
Use Log;

class ControllerPedido extends ApiController
{
    
    public function get_all()
    {
        $data = DB::table('pedido')->select('id_pedido','producto.id_producto','titulo','observaciones','cliente.id_cliente','nombre','pedido.cantidad as cant_pedido','pedido.fecha')
        //->join('inventario',"inventario.id_producto","=","pedido.id_producto")
        ->join('cliente',"cliente.id_cliente","=","pedido.id_cliente")
        ->join('producto',"producto.id_producto","=","pedido.id_producto")
        ->get();

        if ($data->first()) { 
            dd('first');
        } 
if ($data->isEmpty()) {
    dd('no esta vacia');
 }
if ($data->count()) {
    dd('count');
 }
if (count($data)) { 
    dd('sss');
}
       
    }

    // funcion de insertar
   /* public function create(Request $request){

        // inserta los datos
        Inventario::insert([
          'id_producto' => $request->input('producto'),
          'cantidad' => $request->input('cantidad')
        ]);
  
        // respesta de JSON
        $response['message'] = "Guardo exitosamente";
        $response['success'] = true;
  
        return $response;
    }

    public function update(Request $request){

        // inserta los datos
        Inventario::where('id_inventario',$request->input('id_inventario'))->
        update([
          'id_producto' => $request->input('producto'),
          'cantidad' => $request->input('cantidad'),
        ]);
  
        // respesta de JSON
        $response['message'] = "Actualizo exitosamente";
        $response['success'] = true;
  
        return $response;
  
      }*/
}
