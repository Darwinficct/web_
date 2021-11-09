<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use App\Models\Juzgado;
use App\Models\Ciudad;
use App\Models\Caso;
use App\Models\Prueba;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request){

        $ciudades=Ciudad::all();
        $juzgados=null;
        $casos=null;
        $pruebas=null;
        
        if (!is_null($request->ciudad)){
            $juzgados=Juzgado::join('ciudad','juzgado.id_ciudad','ciudad.id')
                ->where('ciudad.id',$request->ciudad)
                ->select('juzgado.*')
                ->get();
        }

        if (!is_null($request->juzgado)){
            $casos=Caso::join('juzgado','caso.id_juzgado','juzgado.id')
                ->where('juzgado.id',$request->juzgado)
                ->select('caso.*')
                ->get();
        }

        if (!is_null($request->caso)){
            $pruebas=Prueba::join('caso','prueba.id_caso','caso.id')
                ->where('caso.id',$request->caso)
                ->select('prueba.*')
                ->get();
        }

        return view('index')->with('ciudades',$ciudades)->with('juzgados',$juzgados)->with('casos',$casos)
        ->with('pruebas',$pruebas);
    }

    public function expedientes(Prueba $prueba){
        $expedientes=Expediente::join('prueba','expediente.id_prueba','prueba.id')
        ->where('prueba.id',$prueba->id)
        ->select('expediente.*')
        ->get();

        return view('expedientes',compact('expedientes','prueba'));
    }
}