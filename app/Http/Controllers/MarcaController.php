<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Requests\MarcaRequest;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $marcas = Marca::get();

      return view('marcas.index', compact('marcas'));
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
    public function store(MarcaRequest $request)
    {
          //dd($request->all());
          Marca::create($request->all());

      alert()->success('Marca guardado correctamente','Exito!');

      return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcas = Marca::findOrFail($id);
      return view('marcas.index', ['marcas' => $marcas]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marcas = Marca::findOrFail($id);
         $marcas->nombre = request('nombre');
         $marcas->save();
         alert()->success('Marca fue actualizado correctamente','Exito!');
         return redirect('marcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcas = Marca::findOrFail($id);
        $marcas->delete();
        alert()->success('Marca fue eliminado','Exito!');
        return redirect('marcas');
    }
    public function altabaja($estado, $id)
    {
        $marcas = Marca::findOrFail($id);
        if ($estado == '1') {
            $marcas->activo = '0';
            $marcas->save();
            alert()->success('Marca fue desactivado','Exito!');
        } else {
            $marcas->activo = '1';
            alert()->success('Marca fue activado','Exito!');
            $marcas->save();
        }
        return redirect('marcas');
    }
}
