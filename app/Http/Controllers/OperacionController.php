<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use App\Models\Operacion;
use App\Models\Area;
use App\Models\Toperacion;
use App\Models\Equipo;
use App\Models\Locador;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OperacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $equipos = Equipo::where('activo', '1')->get();
        $areas = Area::where('activo', '1')->get();
        $locadors = Locador::where('activo', '1')->get();
        $toperaciones = Toperacion::where('activo', '1')->get();
        $operaciones = Operacion::get();

        return view('operaciones.index', compact('equipos', 'areas', 'locadors', 'toperaciones', 'operaciones'));
    }
    public function create()
    {
        $equipos = Equipo::where('activo', '1')->get();
        return view('operaciones.create', compact('equipos'));
    }
    public function store(Request $request)
    {
        $operacion = new Operacion();
        $operacion->fecha = request('fecha');
        $operacion->hora = Carbon::now()->format('H:i:m');
        $operacion->activo = true;
        $operacion->locador_id = request('id');
        //dd($operacion);
        $operacion->save();
        alert()->success('La Operacion Registrado Correctamente', 'Exito!');

        return redirect()->route('operaciones.index');
    }
    public function show($id)
    {
        $operaciones = Operacion::findOrFail($id);
        return view('operaciones.show', ['operaciones' => $operaciones]);
    }
    public function edit($id)
    {
        $operaciones = Operacion::findOrFail($id);
        return view('operaciones.index', ['operaciones' => $operaciones]);
    }

    public function update(Request $request, $id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->hora =Carbon::now()->format('H:i:m');
        $operacion->fecha = request('fecha');
        $operacion->activo = true;
        $operacion->save();
        alert()->success('Equipo fue actualizado correctamente', 'Exito!');
        return redirect('operaciones');
    }
    public function destroy($id)
    {
        $operacion = Operacion::findOrFail($id);
        $operacion->delete();
        alert()->success('El Operacion Fue Eliminado', 'Exito!');
        return redirect('operaciones');
    }
    public function altabaja($estado, $id)
    {
        $operacion = Operacion::findOrFail($id);
        if ($estado == '1') {
            $operacion->activo = '0';
            $operacion->save();
            alert()->success('La Operacion Fue Desactivado', 'Exito!');
        } else {
            $operacion->activo = '1';
            alert()->success('La Operacion Fue Activado', 'Exito!');
            $operacion->save();
        }
        return redirect('operaciones');
    }
    public function imprimir($id)
    {
        $operaciones = Operacion::find($id);
        $view =  \View::make('operaciones.reporte-pdf', compact('operaciones', $operaciones))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream("reporte.pdf");
    }
  
    public function buscar(Request $request)
    {

        $dni = trim($request->get('dni'));

        $locador = Locador::where('dni', $dni)->first();

        if (is_null($locador)) {

            $url = "https://unasam.dev/integracion/api/dbu/matriculados/2014-2/dni/".$dni;

            try {
                //code...
                $result = file_get_contents($url);
                $data = json_decode(trim($result), true);

                $data=$data['alumno'];
                session()->flashInput([
                    'dni' =>$data['dni'],
                    'nombres' => $data['nombres'],
                    'id' => null,
                    'apellidos' => $data['apellido_paterno'].' '.$data['apellido_materno']
                ]);

                return redirect()->route('operaciones.create')->with('buscar', '');
            } catch (\Throwable $th) {
                //throw $th;
            }

            session()->flashInput([
                'dni' => $dni,
            ]);
            return redirect()->route('locadors.index')->with('buscar', '')->with('errlocador', 'locador mo encontrado');
        } else {
            session()->flashInput([
                'dni' => $dni,
                'nombres' => $locador->nombres,
                'id' => $locador->id,
                'apellidos' => $locador->apellidos
            ]);
            return redirect()->route('operaciones.create')->with('buscar', '');
        }
    }
}
