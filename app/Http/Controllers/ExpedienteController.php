<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expedientes = Expediente::all();
        return view('usuario.expediente.index', compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pruebas = Prueba::all();
        return view('usuario.expediente.create', compact('pruebas'));
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
            'id_prueba' => ['required'],
            'titulo' => ['required', 'max:120'],
        ]);

        if (is_null($request->texto) && is_null($request->imagen) && is_null($request->url_recurso) && is_null($request->archivo)) {
            return back()->withErrors(['error' => 'Introduce al meno uno de los campos del expediente']);
        }

        $validatedData['id_usuario'] = Auth::user()->id;

        if (!is_null($request->texto)) {
            $validatedData['texto'] = $request->texto;
        }

        if (!is_null($request->url_recurso)) {
            $validatedData['url_recurso'] = $request->url_recurso;
        }

        if ($request->hasFile('imagen')) {
            $validatedData['url_imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
        }

        if ($request->hasFile('archivo')) {
            $validatedData['url_archivo'] = Storage::disk('public')->put('archivos', $request->imagen);
        }

        $expediente = Expediente::create($validatedData);

        return redirect()->route('usuario.expedientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(Expediente $expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Expediente $expediente)
    {
        $pruebas = Prueba::all();
        return view('usuario.expediente.edit', compact('expediente', 'pruebas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expediente $expediente)
    {

        $validatedData = $request->validate([
            'id_prueba' => ['required'],
            'titulo' => ['required', 'max:120'],
        ]);

        if (is_null($request->texto) && is_null($request->imagen) && is_null($request->url_recurso) && is_null($request->archivo)) {
            return back()->withErrors(['error' => 'Introduce al meno uno de los campos del expediente']);
        }

        $validatedData['id_usuario'] = Auth::user()->id;

        if (!is_null($request->texto)) {
            $validatedData['texto'] = $request->texto;
        }

        if (!is_null($request->url_recurso)) {
            $validatedData['url_recurso'] = $request->url_recurso;
        }

        if ($request->hasFile('imagen')) {
            if (!is_null($expediente->imagen)) {
                Storage::disk('public')->delete($expediente->url_imagen);
            }

            $validatedData['url_imagen'] = Storage::disk('public')->put('imagenes', $request->imagen);
        }

        if ($request->hasFile('archivo')) {
            if (!is_null($expediente->url_archivo)) {
                Storage::disk('public')->delete($expediente->url_archivo);
            }
            $validatedData['url_archivo'] = Storage::disk('public')->put('archivos', $request->archivo);
        }

        $expediente->update($validatedData);

        return redirect()->route('usuario.expedientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expediente $expediente)
    {
        if (!is_null($expediente->imagen)) {
            Storage::disk('public')->delete($expediente->url_imagen);
        }
        if (!is_null($expediente->url_archivo)) {
            Storage::disk('public')->delete($expediente->url_archivo);
        }
        $expediente->delete();
        return redirect()->route('usuario.expedientes');
    }
}