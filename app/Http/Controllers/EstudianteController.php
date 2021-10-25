<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use App\Models\programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->contactado) {
            $estudiantes = estudiante::where('contactado', $request->contactado)->paginate(2);
        }
        if ($request->filtro) {
            $estudiantes = estudiante::orWhere('email', $request->filtro)
                ->orWhere('nombres', $request->filtro)
                ->orWhere('apellidos', $request->filtro)
                ->orWhere('telefono', $request->filtro)
                ->paginate(2);
        } else if (!$request->filtro && !$request->contactado) {
            $estudiantes = estudiante::orderBy('id', 'asc')->paginate(2);
        }

        $programas = new programa();
        
        return view('estudiantes.index', compact('estudiantes','programas'));
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
        $estudiante = estudiante::where('email', $request->email)->first();
        if (!$estudiante) {
            $estudiante = new estudiante();
        }
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;
        $estudiante->programa_id = $request->programa_id;
        $estudiante->contactado = '2';
        

        $estudiante->save();
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiante $estudiante)
    {
        $programas = programa::all();
        return view('estudiantes.edit', compact('estudiante','programas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiante $estudiante)
    {
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->email = $request->email;
        $estudiante->telefono = $request->telefono;
        $estudiante->programa_id = $request->programa_id;
        $estudiante->contactado = $request->contactado;
        $estudiante->save();
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiante $estudiante)
    {
        $estudiante->delete(); 
        return redirect()->route('estudiantes.index');
    }
}
