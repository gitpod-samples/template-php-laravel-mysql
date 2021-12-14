<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;

class VueloController extends Controller
{
    
    public function index()
    {
        $vuelos = Vuelo::all();  
        #$publicaciones = Publicacion::count();
        #$publicaciones = Publicacion::where('usuario_id','=','$this')->count();
        return view('vuelos.index', compact('vuelos'));
    }

    
    public function create()
    {
        return view('vuelos.create');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|min:10|max:50',
            'origen' => 'required',
            'destino' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'piloto_id' => 'required',
        ]);

        Vuelo::create($request->all());
        return redirect()->route('vuelos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function show(Vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vuelo $vuelo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vuelo $vuelo)
    {
        //
    }


    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Vuelo::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('vuelos.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Vuelo::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('vuelos.index');    
    }
}
