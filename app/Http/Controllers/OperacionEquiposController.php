<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Locador;
use App\Models\Operacion;
use App\Models\Operacion_equipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\Operacion_EquipoExport;
use Maatwebsite\Excel\Excel as SEXCEL;
use Maatwebsite\Excel\Facades\Excel;

class OperacionEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        $equipos = Equipo::where('activo', '1')->get();
        $operaciones = Operacion::findOrFail($id);
        return view('operacion_equipos.create', ['operaciones' => $operaciones, 'equipos' => $equipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $operacion_equipo = new Operacion_equipos();
        $operacion_equipo->equipo_id = request('equipo_id');
        $operacion_equipo->operacion_id = request('operacion_id');
        // dd($operacion_equipo);
        $operacion_equipo->save();
        alert()->success('La Operacion Registrado Correctamente', 'Exito!');





        // return view('operacion_equipos.create');
        return $this->operacion_equipo(request('operacion_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operacion_equipos  $operacion_equipos
     * @return \Illuminate\Http\Response
     */
    public function show(Operacion_equipos $operacion_equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operacion_equipos  $operacion_equipos
     * @return \Illuminate\Http\Response
     */
    public function edit(Operacion_equipos $operacion_equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operacion_equipos  $operacion_equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operacion_equipos $operacion_equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operacion_equipos  $operacion_equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $operacion_equipos = Operacion_equipos::findOrFail($id);

        $opera_id = $operacion_equipos->operacion_id;

        $operacion_equipos->delete();
        alert()->success('El Operacion Fue Eliminado', 'Exito!');
        return $this->operacion_equipo($opera_id);
    }
    public function operacion_equipo($id)
    {
        $equipos = Equipo::where('activo', '1')->get();
        $operaciones = Operacion::findOrFail($id);
        $operacion_equipos = Operacion_equipos::select('operacion_equipos.id', 'e.serie', 'm.nombre','ca.nombre as cat','e.cod_patrimonial')
            ->join('equipos as e', 'e.id', '=', 'operacion_equipos.equipo_id')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->join('modelos as mo', 'mo.id', '=', 'e.modelo_id')
            ->join('colors as c', 'c.id', '=', 'e.categoria_id')
            ->join('categorias as ca', 'ca.id', '=', 'e.categoria_id')
            ->join('operacions as o', 'o.id', '=', 'operacion_equipos.operacion_id')
            ->where('o.id', $id)
            ->get();

        return view('operacion_equipos.create', ['operaciones' => $operaciones, 'equipos' => $equipos, 'operacion_equipos' => $operacion_equipos]);
    }

    public function imprimir($id)
    {
        $fecha=now();
        $equipos = Equipo::where('activo', '1')->get();
        $operaciones = Operacion::findOrFail($id);
        $locador = Operacion_equipos::select('nombres','apellidos','celular')
        ->join('equipos as e', 'e.id', '=', 'operacion_equipos.equipo_id')
        ->join('operacions as o', 'o.id', '=', 'operacion_equipos.operacion_id')
        ->join('locadors as l', 'l.id', '=', 'o.locador_id')
        ->where('o.id', $id)
        ->first();
        $operacion_equipos = Operacion_equipos::select('operacion_equipos.id', 'e.serie', 'm.nombre','ca.nombre as cat','e.cod_patrimonial','l.nombres')
            ->join('equipos as e', 'e.id', '=', 'operacion_equipos.equipo_id')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->join('modelos as mo', 'mo.id', '=', 'e.modelo_id')
            ->join('colors as c', 'c.id', '=', 'e.categoria_id')
            ->join('categorias as ca', 'ca.id', '=', 'e.categoria_id')
            ->join('operacions as o', 'o.id', '=', 'operacion_equipos.operacion_id')
            ->join('locadors as l', 'l.id', '=', 'o.locador_id')
            ->where('o.id', $id)
            ->get();

            $datos=[
                'operacion_equipos'=>$operacion_equipos,
                'responsable'=>$locador->nombres.' '.$locador->apellidos,
                'celular'=>$locador->celular,
                'operaciones'=>$operaciones,
                'equipos' => $equipos,
                'fecha' => $fecha,
            ];
            $view =  \View::make('operacion_equipos.reporte', $datos)->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        // $view =  \View::make('operacion_equipos.reporte', compact('equipos', $equipos,'operaciones', $operaciones,'operacion_equipos',$operacion_equipos))->render();
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);

        return $pdf->stream("reporte.pdf");
    }

    public function export_operacion_equipo()
    {
        return Excel::download(new Operacion_EquipoExport, 'general.xlsx');
    }
}
