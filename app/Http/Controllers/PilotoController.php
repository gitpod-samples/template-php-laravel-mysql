<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    public function imprimir(){
        $pilotos = Piloto::all();
        $pdf = \PDF::loadView('pdfs.pilotopdf', compact('pilotos'));
        return $pdf->download('impresion.pdf');
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pilotos = Piloto::all();
        return view('pilotos.index', compact('pilotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function show(Piloto $piloto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function edit(Piloto $piloto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piloto $piloto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piloto  $piloto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piloto $piloto)
    {
        //
    }

    public function vuelosPiloto($id)    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        $piloto = Piloto::find($id);           /*select * from usuarios where usuario_id='1' */

        return view('vuelos_piloto.index', compact('piloto'));   
    }
}
