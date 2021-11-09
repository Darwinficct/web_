<?php

namespace App\Http\Controllers;

use App\Models\Juzgado;
use App\Models\Caso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casos=Caso::all();
        return view('admin.caso.index',compact('casos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juzgados=Juzgado::all();
        return view('admin.caso.create',compact('juzgados'));
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
        'id_juzgado' => ['required'],
        'nombre' => ['required','max:120'],
        'sigla' => ['required','max:30'],
        ]);


        $caso=Caso::create($validatedData);

        return redirect()->route('admin.casos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Caso $caso
     * @return \Illuminate\Http\Response
     */
    public function show(Caso $caso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function edit(Caso $caso)
    {
        $juzgados=Juzgado::all();
        return view('admin.caso.edit',compact('caso','juzgados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caso $caso)
    {
        $validatedData = $request->validate([
            'id_juzgado' => ['required'],
            'nombre' => ['required','max:120'],
            'sigla' => ['required','max:30'],
            ]);
            
           
            $caso->update($validatedData);
    
            return redirect()->route('admin.casos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Caso  $caso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caso $caso)
    {
        $caso->delete();
        return redirect()->route('admin.casos');
    }
}   