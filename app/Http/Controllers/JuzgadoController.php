<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Juzgado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JuzgadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juzgados = Juzgado::all();
        return view('admin.juzgado.index', compact('juzgados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('admin.juzgado.create', compact('ciudades'));
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
            'id_ciudad' => ['required'],
            'nombre' => ['required', 'max:120'],
            'codigo' => ['required', 'max:30', 'unique:juzgado,codigo'],
        ]);

        $juzgado = Juzgado::create($validatedData);

        return redirect()->route('admin.juzgados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function show(Juzgado $juzgado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function edit(Juzgado $juzgado)
    {
        $ciudades = Ciudad::all();
        return view('admin.juzgado.edit', compact('juzgado', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juzgado $juzgado)
    {

        $validatedData = $request->validate([
            'id_ciudad' => ['required'],
            'nombre' => ['required', 'max:120'],
            'codigo' => ['required', 'max:30', 'unique:juzgado,codigo'],
        ]);

        $juzgado->update($validatedData);

        return redirect()->route('admin.juzgados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juzgado  $juzgado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juzgado $juzgado)
    {
        $juzgado->delete();
        return redirect()->route('admin.juzgados');
    }
}
