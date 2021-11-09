<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Prueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pruebas = Prueba::all();
        return view('usuario.prueba.index', compact('pruebas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casos = Caso::all();
        return view('usuario.prueba.create', compact('casos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_caso' => ['required'],
            'nombre' => ['required', 'max:120'],
            'descripcion' => ['required', 'max:250'],
        ]);

        $prueba = Prueba::create($validatedData);

        return redirect()->route('usuario.pruebas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $prueba)
    {
        $casos = Caso::all();
        return view('usuario.prueba.edit', compact('prueba', 'casos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prueba $prueba)
    {

        $validatedData = $request->validate([
            'id_caso' => ['required'],
            'nombre' => ['required', 'max:120'],
            'descripcion' => ['required', 'max:250'],
        ]);

        $prueba->update($validatedData);

        return redirect()->route('usuario.pruebas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $prueba)
    {
        $prueba->delete();
        return redirect()->route('usuario.pruebas');
    }
}
