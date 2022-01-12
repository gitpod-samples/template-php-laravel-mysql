<?php

namespace App\Http\Controllers;

use App\Models\Pasaje;
use App\Models\Piloto;
use App\Models\Vuelo;
use Illuminate\Http\Request;

class PasajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasajes = Pasaje::all();
        return view('pasajes.index', compact('pasajes'));
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
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function show(Pasaje $pasaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasaje $pasaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasaje  $pasaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasaje $pasaje)
    {
        //
    }

    public function destroy(Pasaje $pasaje)
    {
        //
    }

    public function masPasaje($id)
    {
        $pasaje = Pasaje::find($id);
        
        $pasaje->precio = $pasaje->precio+1;
        $pasaje->save();
        
        return redirect()->route('pasajes.index');
    }

    public function menosPasaje($id)
    {
        $pasaje = Pasaje::find($id);
        
        $pasaje->precio = $pasaje->precio-1;
        $pasaje->save();
        
        return redirect()->route('pasajes.index');
    }
}
