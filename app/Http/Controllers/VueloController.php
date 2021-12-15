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

   //$vuelo
    public function show($vuelo)
    {
        $vuelo = Vuelo::findOrFail($vuelo);

        return view ('vuelos.show')->with([
            'vuelo' => $vuelo,
        ]);
    }

   
    public function edit(Vuelo $vuelo)
    {
        //
    }

   
    public function update(Request $request, Vuelo $vuelo)
    {
        //
    }

   

    //$id
    public function destroy($id)
    {
        
        //Si va con este:
        Vuelo::find($id)->delete();
        return redirect()->route('vuelos.index');
        
        /*Vuelo::find($id)->delete($id);
        return view('vuelos.index');*/
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
