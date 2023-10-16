<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::get();

      return view('categorias.index', compact('categorias'));
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
    public function store(CategoriaRequest $request)
    {
          //dd($request->all());
          Categoria::create($request->all());

      alert()->success('Categoria guardado correctamente','Exito!');

      return redirect()->route('categorias.index');
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
        $categorias = Categoria::findOrFail($id);
      return view('categorias.index', ['categorias' => $categorias]);

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
        $categorias = Categoria::findOrFail($id);
         $categorias->nombre = request('nombre');
         $categorias->save();
         alert()->success('Categoria fue actualizado correctamente','Exito!');
         return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = Categoria::findOrFail($id);
        $categorias->delete();
        alert()->success('Categoria fue eliminado','Exito!');
        return redirect('categorias');
    }
    public function altabaja($estado, $id)
    {
        $categorias = Categoria::findOrFail($id);
        if ($estado == '1') {
            $categorias->activo = '0';
            $categorias->save();
            alert()->success('Categoria fue desactivado','Exito!');
        } else {
            $categorias->activo = '1';
            alert()->success('Categoria fue activado','Exito!');
            $categorias->save();
        }
        return redirect('categorias');
    }
}
