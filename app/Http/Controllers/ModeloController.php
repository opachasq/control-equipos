<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModeloCreateRequest;
use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $modelos = Modelo::get();

      return view('modelos.index', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModeloCreateRequest $request)
    {
        Modelo::create($request->all());

      alert()->success('Modelo guardado correctamente','Exito!');

      return redirect()->route('modelos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelos = Modelo::findOrFail($id);
        return view('modelos.index', ['modelos' => $modelos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelos = Modelo::findOrFail($id);
         $modelos->nombre = request('nombre');
         $modelos->save();
         alert()->success('El modelo fue actualizado correctamente','Exito!');
         return redirect('modelos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelos = Modelo::findOrFail($id);
        $modelos->delete();
        alert()->success('El modelo fue eliminado','Exito!');
        return redirect('modelos');
    }
    public function altabaja($estado, $id)
    {
        $modelos = Modelo::findOrFail($id);
        if ($estado == '1') {
            $modelos->activo = '0';
            $modelos->save();
            alert()->success('El modelo fue desactivado','Exito!');
        } else {
            $modelos->activo = '1';
            alert()->success('El modelo fue activado','Exito!');
            $modelos->save();
        }
        return redirect('modelos');
    }
}
