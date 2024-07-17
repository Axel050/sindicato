<?php

use App\Http\Controllers\SideMenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
       $user = auth()->user();

    // Verifica si el usuario tiene al menos un rol
    if (!$user->roles()->exists()) {
        return abort(403, 'No autorizado');               
    }
        return view('dashboard');
    })->name('dashboard');

    // USUARIOS
    Route::get('/usuarios',[SideMenuController::class, "usuarios"])->name('usuarios');

    Route::get('/roles',[SideMenuController::class, "roles"])->name('roles');

    // MIEMBROS
    Route::get('/miembros',[SideMenuController::class, "miembros"])->name('miembros');

    //TABLAS AUXILIARES
    Route::get('/empresas',[SideMenuController::class, "tablaEmpresa"])->name('empresas');

    Route::get('/gremios',[SideMenuController::class, "tablaGremio"])->name('gremios');

    Route::get('/sectores',[SideMenuController::class, "tablaSector"])->name('sectores');

    Route::get('/condiciones',[SideMenuController::class, "tablaCondicion"])->name('condiciones');

    //  function () {
    //     return view('admin.tablas.empresas');}
    // Route::get('/provincias', [TableController::class,"provincias"])->name('provincias'

  });