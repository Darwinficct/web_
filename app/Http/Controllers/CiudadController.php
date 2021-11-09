<?php

namespace App\Http\Controllers;

use App\Models\Juzgado;
use App\Models\Ciudad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades=Ciudad::all();
        return view('admin.ciudad.index',compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ciudad.create');
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
            'sigla' => ['required','max:12','unique:ciudad,sigla'],
            'nombre' => ['required','max:120'],
        ]);
        
        $ciudad=Ciudad::create($validatedData);

        return redirect()->route('admin.ciudades');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show(Ciudad $ciudad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudad $ciudad)
    {
        return view('admin.ciudad.edit',compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        $validatedData = $request->validate([
            'sigla' => ['required','max:12','unique:ciudad,sigla'],
            'nombre' => ['required','max:120'],
        ]);
        
        $ciudad->update($validatedData);

        return redirect()->route('admin.ciudades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return redirect()->route('admin.ciudades');
    }
}