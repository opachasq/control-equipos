<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Genero;
use App\Models\Locador;
use App\Http\Requests\LocadorCreateRequest;
use Illuminate\Http\Request;

class LocadorController extends Controller
{
  
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $generos = Genero::where('activo', '1')->get();
        $areas = Area::where('activo', '1')->get();
        $locadors = Locador::get();

      return view('locadores.index', compact('generos','areas','locadors'));
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
    public function store(LocadorCreateRequest $request)
    {
        $locador = new Locador();
        $locador->dni = request('dni');
        $locador->codigo = request('codigo');
        $locador->nombres = request('nombres');
        $locador->apellidos = request('apellidos');
        $locador->celular = request('celular');
        $locador->activo = true;
        $locador->genero_id = request('genero_id');
        $locador->area_id = request('area_id');
        //dd($locador);
        $locador->save();
        alert()->success('Locador Registrado Correctamente','Exito!');

      return redirect()->route('locadores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locador  $locador
     * @return \Illuminate\Http\Response
     */
    public function show(Locador $locador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locador  $locador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locador = Locador::findOrFail($id);
      return view('locadores.index', compact('locador'));
    }

    public function update(Request $request, $id)
    {
        $locador = Locador::findOrFail($id);
        $locador->dni = request('dni');
        $locador->codigo = request('codigo');
        $locador->nombres = request('nombres');
        $locador->apellidos = request('apellidos');
        $locador->celular = request('celular');
        $locador->activo = true;
        $locador->genero_id = request('genero_id');
        $locador->area_id = request('area_id');
        //dd($locador);
        $locador->save();
        alert()->success('Locador Actualizado Correctamente','Exito!');
        return redirect('locadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locador  $locador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locador = Locador::findOrFail($id);
        $locador->delete();
        alert()->success('Locador Fue Eliminado','Exito!');
        return redirect('locadores');
    }
    public function altabaja($estado, $id)
    {
        $locador = Locador::findOrFail($id);
        if ($estado == '1') {
            $locador->activo = '0';
            $locador->save();
            alert()->success('Locador Fue Desactivado','Exito!');
        } else {
            $locador->activo = '1';
            alert()->success('Locador Fue Activado','Exito!');
            $locador->save();
        }
        return redirect('locadores');
    }
}
