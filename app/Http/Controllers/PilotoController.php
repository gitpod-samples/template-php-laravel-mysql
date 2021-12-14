<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;


class PilotoController extends Controller
{
    //Lista de usuarios
    public function index()
    {
        $pilotos = Piloto::all();  
        #$publicaciones = Publicacion::count();
        #$publicaciones = Publicacion::where('usuario_id','=','$this')->count();
        return view('pilotos.index', compact('pilotos'));
    }

    

    //Crear un usuario
    public function create()
    {
        return view('pilotos.create');
    }

    //Almacenar usuario creado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|min:10|max:50',
            'apellidos' => 'required',
            'f_nacimiento' => 'required',
            'email' => 'required',
            'dni' => 'required',
            'telefono' => 'required',
        ]);

        Piloto::create($request->all());
        return redirect()->route('pilotos.index');
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







    public function restore()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Usuario::withTrashed()->restore(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('usuarios.index');    
    }

    public function onlyTrashed()    /*Si queremos que se restaure un solo usuario se pasaría un parámetro como el ($id)*/   
    {
        Usuario::onlyTrashed()->forceDelete(); /*buscar en la papelera, luego método de restauración*/

        return redirect()->route('usuarios.index');    
    }
}
