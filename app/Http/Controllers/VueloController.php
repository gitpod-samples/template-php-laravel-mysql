<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use App\Models\Piloto;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos = Vuelo::all();
        return view('vuelos.index', compact('vuelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pilotos = Piloto::all();

        return view('vuelos.create', compact('pilotos'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo'        => 'required|alpha_num',
            'origen'        => 'required|different:destino|min:5|max:50',
            'destino'       => 'required|different:origen|min:5|max:50',
            'fecha'         => 'required|date|after:today',
            'hora'          => 'required',
            'piloto_id'     => 'required',
            'dni'           => 'new ValidacionDni',
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
    public function edit($id)
    {
        $vuelo = Vuelo::find($id);    /*::está buscando en el modelo*/
        return view('vuelos.edit', compact('vuelo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'codigo'        => 'required|alpha_num',
            'origen'        => 'required|different:destino|min:5|max:50',
            'destino'       => 'required|different:origen|min:5|max:50',
            'fecha'         => 'required|date|after:today',
            'hora'          => 'required',
            'piloto_id'     => 'required',
        ]);

        $vuelo = Vuelo::find($id);
        $vuelo->update($request->all());

        return redirect()->route('vuelos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vuelo  $vuelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vuelo::find($id)->delete();

        return redirect()->route('vuelos.index');    
    }
}
