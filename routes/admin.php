<?php

use App\Http\Controllers\Admin\CadenaController;
use App\Http\Controllers\Admin\CodigoInversionesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
Use App\Http\Controllers\Admin\RoleController;
Use App\Http\Controllers\Admin\ProvinciaController;
use App\Http\Controllers\Admin\EntidadesController;
use App\Http\Controllers\Admin\InstalacionesController;
use App\Http\Controllers\Admin\ObraController;
use App\Http\Controllers\Admin\EjecutorsController;
use App\Http\Controllers\Admin\GastosController;
use App\Http\Controllers\Admin\ServiciosController;
use App\Http\Controllers\Admin\DesagregacionesController;
use App\Http\Controllers\Admin\EjecucionesController;
use App\Http\Controllers\Admin\EmpresasController;
use App\Http\Controllers\Admin\ImportadoresController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\MunicipiosController;
use App\Http\Controllers\Admin\OrganismosController;
use App\Http\Controllers\Admin\ReportesController;
use App\Http\Controllers\Admin\TipobrasController;
use App\Http\Controllers\Admin\TiposController;


Route::get('', [HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');

Route::get('log', [UserController::class, 'activitylog'])->middleware('can:admin.home')->name('admin.log');

Route::resource('users', UserController::class)->middleware('can:admin.users.index')->names('admin.users');

Route::resource('roles', RoleController::class)->middleware('can:admin.roles.index')->names('admin.roles');

Route::resource('permisos', PermissionController::class)->middleware('can:admin.permisos.index')->names('admin.permisos');

Route::resource('provincias', ProvinciaController::class)->middleware('can:admin.provincias.index')->names('admin.provincias'); 

Route::resource('entidades', EntidadesController::class)->middleware('can:admin.entidades.index')->names('admin.entidades'); 

Route::resource('instalaciones', InstalacionesController::class)->names('admin.instalaciones');

Route::resource('obras', ObraController::class)->names('admin.obras');

Route::resource('ejecutors', EjecutorsController::class)->names('admin.ejecutors');

Route::resource('servicios', ServiciosController::class)->names('admin.servicios');

Route::resource('empresas', EmpresasController::class)->names('admin.empresas');

Route::resource('importadores',ImportadoresController::class)->names('admin.importadores');

Route::resource('organismos',OrganismosController::class)->names('admin.organismos');

Route::resource('desagregaciones',DesagregacionesController::class)->names('admin.desagregaciones');

Route::resource('gastos', GastosController::class)->names('admin.gastos');

Route::resource('ejecuciones',EjecucionesController::class)->names('admin.ejecuciones');

Route::resource('tipos',TiposController::class)->names('admin.tipos');

Route::resource('municipios',MunicipiosController::class)->names('admin.municipios');

Route::resource('tipobras', TipobrasController::class)->names('admin.tipobras');

Route::resource('cadenas', CadenaController::class)->names('admin.cadenas');

Route::resource('codigo', CodigoInversionesController::class)->names('admin.codigo');

Route::resource('loguser', LogController::class)->names('admin.loguser');

Route::get('reportes', [ReportesController::class,'filtrar'])->middleware('auth')->name('admin.reportes');

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('can:admin.permisos.index')->name('admin.logs');


