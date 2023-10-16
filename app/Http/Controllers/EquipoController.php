<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Color;
use App\Models\Equipo;
use App\Http\Requests\EquipoRequest;
use Illuminate\Http\Request;
use App\Imports\EquipoImport;
use App\Exports\EquipoExport;
use App\Exports\Equipo_bajasExport;
use Maatwebsite\Excel\Excel as SEXCEL;
use Maatwebsite\Excel\Facades\Excel;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::where('activo', '1')->get();
        $marcas = Marca::where('activo', '1')->get();
        $colors = Color::where('activo', '1')->get();
        $modelos = Modelo::where('activo', '1')->get();
        $equipos = Equipo::where('activo','1')->get();

      return view('equipos.index', compact('equipos','categorias','marcas','colors','modelos'));
    }
    public function index1()
    {
        $categorias = Categoria::where('activo', '1')->get();
        $marcas = Marca::where('activo', '1')->get();
        $colors = Color::where('activo', '1')->get();
        $modelos = Modelo::where('activo', '1')->get();
        $equipos = Equipo::where('activo','0')->get();

      return view('equipos.equipos_baja', compact('equipos','categorias','marcas','colors','modelos'));
    }
    public function store(EquipoRequest $request)
    {
        $equipo = new Equipo();
        $equipo->serie = request('serie');
        $equipo->cod_patrimonial = request('cod_patrimonial');
        $equipo->caracteristica = request('caracteristica');
        $equipo->activo = true;
        $equipo->categoria_id = request('categoria_id');
        $equipo->marca_id = request('marca_id');
        $equipo->color_id = request('color_id');
        $equipo->modelo_id = request('modelo_id');
        //dd($equipo);
        $equipo->save();
        alert()->success('La equipo Registrado Correctamente','Exito!');

      return redirect()->route('equipos.index');
    }

    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
      return view('equipos.index', ['equipo' => $equipo]);

    }

    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->serie = request('serie');
        $equipo->cod_patrimonial = request('cod_patrimonial');
        $equipo->caracteristica = request('caracteristica');
        $equipo->activo = true;
        $equipo->categoria_id = request('categoria_id');
        $equipo->marca_id = request('marca_id');
        $equipo->color_id = request('color_id');
        $equipo->modelo_id = request('modelo_id');
        $equipo->save();
         alert()->success('Equipo fue actualizado correctamente','Exito!');
         return redirect('equipos');
    }
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);
        $equipo->delete();
        alert()->success('El Equipo Fue Eliminado','Exito!');
        return redirect('equipos');
    }
    public function altabaja($estado, $id)
    {
        $equipo = Equipo::findOrFail($id);
        if ($estado == '1') {
            $equipo->activo = '0';
            $equipo->save();
            alert()->success('La Equipo Fue Desactivado','Exito!');
        } else {
            $equipo->activo = '1';
            alert()->success('La Equipo Fue Activado','Exito!');
            $equipo->save();
        }
        return redirect('equipos');
    }
    public function equipo_operacion($estado, $id)
    {
        $equipo = Equipo::findOrFail($id);
        if ($estado == '1') {
            $equipo->activo = '0';
            $equipo->save();
            alert()->success('La Equipo Fue Desactivado','Exito!');
            
        } else {
            $equipo->activo = '1';
            alert()->success('La Equipo Fue Activado','Exito!');
            $equipo->save();
        }
        return view('/operaciones.index');
    }
    public function import(Request $request)
    {
      $file = $request->file('import_file');
      Excel::import(new EquipoImport, $file);
      alert()->success('Equipos Importados','Exitosamente!');  
      return redirect('equipos');
    }
    public function export()
    {
        return Excel::download(new EquipoExport, 'equipos.xlsx');
    }
    public function export_baja_equipo()
    {
        return Excel::download(new Equipo_bajasExport, 'equipos_baja.xlsx');
    }
}
