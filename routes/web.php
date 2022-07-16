<?php

use App\Http\Controllers\admin\EventoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin/dash', function () {
        return view('dash.index');
    })->name('dashboard');

    Route::resource('admin/evento',EventoController::class)->names('admin.evento');
/*
    Route::get('evento',[EventoController::class,'index'])->name('admin.evento.index');
    Route::post('evento',[EventoController::class,'store'])->name('admin.evento.store');
    Route::put('evento/{id}',[EventoController::class,'update'])->name('admin.evento.update');
    Route::get('evento/{id}',[EventoController::class,'show'])->name('admin.evento.show');
    Route::delete('evento/{id}',[EventoController::class,'destroy'])->name('admin.evento.destroy');*/
});
