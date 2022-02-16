<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Chofer;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    
    function obtenerLista(){
        $choferes = Chofer::all();

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $choferes;

        return response()->json($response,200);

    }
    function obtenerItem($id){
        $chofer = Chofer::find($id);

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $chofer;

        return response()->json($response,200);

    }
    function udpate(Request $request){
        $chofer = Chofer::find($request->id);

        if($chofer)
        {
            $chofer -> codigo = $request->codigo;
            $chofer -> nombre = $request->nombre;
            $chofer -> apellido = $request->apellido;
            $chofer -> numdocumento = $request->numdocumento;
            $chofer -> licencia = $request->licencia;
            $chofer -> save(); 
        }

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $chofer;

        return response()->json($response,200);
    }
    function patch(Request $request){
        $chofer = Chofer::find($request->id);

        if($chofer)
        {
            if($chofer){
                if(isset($request->codigo))
                $chofer -> codigo = $request->codigo;
                if(isset($request->nombre))
                $chofer -> nombre = $request->nombre;

                if(isset($request->numdocumento))
                $chofer -> numdocumento = $request->numdocumento;

                if(isset($request->licencia))
                $chofer -> licencia = $request->licencia;

                $chofer -> save();                 
            }               
        }

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $chofer;

        return response()->json($response,200);
    }

    function storage(Request $request){

        $chofer = new Chofer();
        $chofer -> codigo = $request->codigo;
        $chofer -> nombre = $request->nombre;
        $chofer -> apellido = $request->apellido;
        $chofer -> numdocumento = $request->numdocumento;
        $chofer -> licencia = $request->licencia;
        $chofer -> save(); 

        $response = new \stdClass();
        $response -> success = true;
        $response -> data = $chofer;

        return response()->json($response,200);
    }
    function delete($id){
        $response = new \stdClass();
        $response -> success = true;
        $response_code = 200;

        $chofer = Chofer::find($id);

        if($chofer){
            $chofer->delete();
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