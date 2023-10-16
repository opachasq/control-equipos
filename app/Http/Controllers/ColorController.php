<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorCreateRequest;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $colores = Color::get();

      return view('colores.index', compact('colores'));
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
    public function store(ColorCreateRequest $request)
    {
          //dd($request->all());
          Color::create($request->all());

      alert()->success('Color guardado correctamente','Exito!');

      return redirect()->route('colores.index');
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
        $colores = Color::findOrFail($id);
      return view('colores.index', ['colores' => $colores]);

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
        $colores = Color::findOrFail($id);
         $colores->nombre = request('nombre');
         $colores->save();
         alert()->success('Color fue actualizado correctamente','Exito!');
         return redirect('colores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colores = Color::findOrFail($id);
        $colores->delete();
        alert()->success('Color fue eliminado','Exito!');
        return redirect('colores');
    }
    public function altabaja($estado, $id)
    {
        $colores = Color::findOrFail($id);
        if ($estado == '1') {
            $colores->activo = '0';
            $colores->save();
            alert()->success('Color fue desactivado','Exito!');
        } else {
            $colores->activo = '1';
            alert()->success('Color fue activado','Exito!');
            $colores->save();
        }
        return redirect('colores');
    }
}
