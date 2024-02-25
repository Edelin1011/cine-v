<?php

namespace App\Http\Controllers;

use App\Models\Cine;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peli=Cine::all();
        //pagina inicio
        return view('welcome',compact('peli'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Aqui puedes agregar";
    }
    public function agregar()
    {
        return view('agregar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $id = $request->input('idform');
       $entradas = $request->input('entradas2');
   
       
        DB::statement('CALL ventas_cines (?, ?)', array($id, $entradas));
       
       return redirect()->route("Cine.index")->with("Success", "El proceso de guardado se ha iniciado correctamente.");
    }

    /**
     * Display the specified resource.
     */

    public function stori(Request $request2)
    {
        // Obtener los datos del formulario
        $idform = $request2->input('nombre');
        $entradas2 = $request2->input('Precio');
        $imagen = $request2->file('imagen');
        
        echo "Imagen: " . $imagen->getClientOriginalName() . "<br>";
        $nombreImagen = $imagen->getClientOriginalName();
        $imagen->storeAs('public', $nombreImagen);
        //echo "ID Formulario: " . $imagen . "<br>";
        DB::statement('CALL agregar_funcion(?, ? , ?)', array($idform, $entradas2,$nombreImagen));
        return redirect()->route("Cine.index")->with("Success", "El proceso de guardado se ha iniciado correctamente.");
    }

    public function show(Cine $cine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cine $cine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cine $cine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cine $cine)
    {
        //
    }
}
