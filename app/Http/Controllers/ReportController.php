<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use App\Models\Area;
use App\Models\Estado;
use App\Models\Equipo;
use App\Models\Operacion;
use App\Models\Operacion_equipos;
use App\Models\Toperacion;
use Carbon\Carbon;


class ReportController extends Controller
{


    public function reporte_dia(){
       
        $operaciones = Operacion::whereDate('created_at', now()->format('Y-m-d'))->get();
        
        return view('reports.report_dia', compact('operaciones'));
    }
    public function reporte_fecha(Request $request){
       
        session()->flashInput([
            'fecha_fin'=>now()->format('Y-m-d'),

        ]);
        $equipos=Equipo::where('activo','1')->get();
        $operacion_equipos = Operacion::whereDate('created_at', now()->format('Y-m-d'))->get();
        return view('reports.report_fecha',compact('operacion_equipos','equipos'));
    } 

    public function reporte_resultado(Request $request){

        
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        // dd($fi);
        session()->flashInput($request->input());
        $equipos=Equipo::where('activo','1')->get();
        $operacion_equipos = Operacion_equipos::select('operacion_equipos.id', 'e.serie', 'm.nombre','ca.nombre as cat','e.cod_patrimonial','l.nombres','l.apellidos')
            ->join('equipos as e', 'e.id', '=', 'operacion_equipos.equipo_id')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->join('modelos as mo', 'mo.id', '=', 'e.modelo_id')
            ->join('colors as c', 'c.id', '=', 'e.categoria_id')
            ->join('categorias as ca', 'ca.id', '=', 'e.categoria_id')
            ->join('operacions as o', 'o.id', '=', 'operacion_equipos.operacion_id')
            ->join('locadors as l', 'l.id', '=', 'o.locador_id')
            ->whereBetween('o.created_at', [$fi, $ff])->get();
           
        //$operaciones1 = Operacion::whereBetween('created_at', [$fi, $ff])->get();
        //dd($equipos,$equipos);
        return view('reports.report_fecha',compact('operacion_equipos','equipos'));
    }
    
    public function generar_pdf(Request $request){
        $fi = $request->fecha_ini.' 00:00:00';
        $ff = $request->fecha_fin.' 23:59:59';
        $fecha=now();
        $operacion_equipos = Operacion_equipos::select('operacion_equipos.id', 'e.serie', 'm.nombre','ca.nombre as cat','e.cod_patrimonial','l.nombres','l.apellidos')
            ->join('equipos as e', 'e.id', '=', 'operacion_equipos.equipo_id')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->join('modelos as mo', 'mo.id', '=', 'e.modelo_id')
            ->join('colors as c', 'c.id', '=', 'e.categoria_id')
            ->join('categorias as ca', 'ca.id', '=', 'e.categoria_id')
            ->join('operacions as o', 'o.id', '=', 'operacion_equipos.operacion_id')
            ->join('locadors as l', 'l.id', '=', 'o.locador_id')
            ->whereBetween('o.created_at', [$fi, $ff])->get();
            

        $datos=[
            'operacion_equipos'=>$operacion_equipos,
            'titulo'=>'  Desde '.$fi.' hasta '.$ff,
            'fecha'=>$fecha
        ];

        $view =  \View::make('reports.report_fecha_pdf', $datos)->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
    
        // return $pdf->download("reporte.pdf");
        return $pdf->stream("reporte.pdf");
    }


}
