<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    function obtenerLista(){
        $clientes = Cliente::all();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $clientes;

        return response()->json($response,200);
    }
    function obtenerItem($id){
        $cliente = Cliente::find($id);

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);

    }

    function udpate(Request $request){
        $cliente = Cliente::find($request->id);

        if($cliente)
        {
            $cliente -> codigo = $request->codigo;
            $cliente -> nombre = $request->nombre;
            $cliente -> apellido = $request->apellido;
            $cliente -> celular = $request->celular;
            $cliente -> numdocumento = $request->numdocumento;
            $cliente -> save(); 
        }

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }

    function patch(Request $request){
        $cliente = Cliente::find($request->id);

        if($cliente)
        {
            if($cliente){
                if(isset($request->codigo))
                $cliente -> codigo = $request->codigo;
                if(isset($request->nombre))
                $cliente -> nombre = $request->nombre;

                if(isset($request->apellido))
                $cliente -> apellido = $request->apellido;

                if(isset($request->celular))
                $cliente -> celular = $request->celular;

                if(isset($request->numdocumento))
                $cliente -> numdocumento = $request->numdocumento;

                $cliente -> save();                 
            }               
        }

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function storage(Request $request){

        $cliente = new Cliente();
        $cliente -> codigo = $request->codigo;
        $cliente -> nombre = $request->nombre;
        $cliente -> apellido = $request->apellido;
        $cliente -> celular = $request->celular;
        $cliente -> numdocumento = $request->numdocumento;
        $cliente -> save(); 

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $cliente;

        return response()->json($response,200);
    }
    function delete($id){
        $response = new \stdClass();
        $response -> success = true;
        $response_code = 200;

        $cliente = Cliente::find($id);

        if($cliente){
            $cliente->delete();
            $response -> success = true;
            $response_code = 200;
        }else{
            $response -> error= ["el elemento ya ha sido eliminado"];
            $response->success = false;
            $response_code = 500;
        }


        return response()->json($response,200);
    }
}