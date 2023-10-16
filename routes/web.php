<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LocadorController;
use App\Http\Controllers\OperacionEquiposController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/', [IndexController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/categorias', CategoriaController::class);
Route::get('Categoria/altabaja/{estado}/{id}',[CategoriaController::class,'altabaja']);

Route::resource('/marcas', MarcaController::class);
Route::get('Marca/altabaja/{estado}/{id}',[MarcaController::class,'altabaja']);

Route::resource('/areas', AreaController::class);
Route::get('Area/altabaja/{estado}/{id}',[AreaController::class,'altabaja']);

Route::resource('/modelos', ModeloController::class);
Route::get('Modelo/altabaja/{estado}/{id}',[ModeloController::class,'altabaja']);

Route::resource('/colores', ColorController::class);
Route::get('Color/altabaja/{estado}/{id}',[ColorController::class,'altabaja']);

Route::resource('/equipos', EquipoController::class);
Route::get('Equipo/altabaja/{estado}/{id}',[EquipoController::class,'altabaja']);
Route::get('/equipos_baja', [App\Http\Controllers\EquipoController::class, 'index1'])->name('index1');

Route::resource('/locadores', LocadorController::class);
Route::get('Locador/altabaja/{estado}/{id}',[LocadorController::class,'altabaja']);

Route::resource('/operaciones', OperacionController::class);

Route::get('Operacion/altabaja/{estado}/{id}',[OperacionController::class,'altabaja']);
Route::get('Operacion/imprimir/{id}',[OperacionController::class,'imprimir']);

Route::get('Operacion/buscar',[OperacionController::class,'buscar'])->name('operacion.buscar');

Route::resource('/users', UserController::class);


Route::resource('/operacion_equipos', OperacionEquiposController::class);
Route::get('Operacion_equipos/operacion_equipo/{id}',[OperacionEquiposController::class,'operacion_equipo']);
Route::get('Operacion_equipos/imprimir/{id}',[OperacionEquiposController::class,'imprimir']);


Route::get('/reports', [App\Http\Controllers\ReportController::class, 'reporte_dia'])->name('reporte_dia');
Route::get('/reporte_fecha', [App\Http\Controllers\ReportController::class, 'reporte_fecha'])->name('reporte_fecha');
Route::post('/reporte_resultado', [App\Http\Controllers\ReportController::class, 'reporte_resultado'])->name('reporte_resultado');

Route::post('Equipo/import',[EquipoController::class,'import']);
Route::get('Equipo/export',[EquipoController::class,'export'])->name('equipos.export');
Route::get('Equipo/export_baja_equipo',[EquipoController::class,'export_baja_equipo'])->name('equipos.export_baja_equipo');

Route::get('Operacion_equipos/export_operacion_equipo',[OperacionEquiposController::class,'export_operacion_equipo'])->name('Operacion_equipos.export_operacion_equipo');

Route::get('Reporte-pdf',[ReportController::class,'generar_pdf'])->name('decargar-pdf');