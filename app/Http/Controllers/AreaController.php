<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\AreaRequest;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $areas = Area::get();

      return view('areas.index', compact('areas'));
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
    public function store(AreaRequest $request)
    {
          //dd($request->all());
          Area::create($request->all());

      alert()->success('Area guardado correctamente','Exito!');

      return redirect()->route('areas.index');
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
        $areas = Area::findOrFail($id);
      return view('areas.index', ['areas' => $areas]);

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
        $areas = Area::findOrFail($id);
         $areas->nombre = request('nombre');
         $areas->save();
         alert()->success('Area fue actualizado correctamente','Exito!');
         return redirect('areas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $areas = Area::findOrFail($id);
        $areas->delete();
        alert()->success('Area fue eliminado','Exito!');
        return redirect('areas');
    }
    public function altabaja($estado, $id)
    {
        $areas = Area::findOrFail($id);
        if ($estado == '1') {
            $areas->activo = '0';
            $areas->save();
            alert()->success('Area fue desactivado','Exito!');
        } else {
            $areas->activo = '1';
            alert()->success('Area fue activado','Exito!');
            $areas->save();
        }
        return redirect('areas');
    }
}
