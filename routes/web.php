<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TemaController;
use App\Http\Livewire\Albumes;
use App\Http\Livewire\Contador;
use App\Mail\Prueba;
use Illuminate\Support\Facades\Mail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('albumes', AlbumController::class)
    ->parameters(['albumes' => 'album']);

Route::resource('temas', TemaController::class);

Route::get('/album/{album}/tema/{tema:id}', [TemaController::class, 'show']);

Route::get('/albumes/{album}/descargar', [AlbumController::class, 'descargar'])
    ->name('albumes-descargar');

Route::get('/correo', function () {
    Mail::to('ricardo@iesdonana.org')->send(new Prueba('Manolito'));
});

Route::get('/alpine', function () {
    return view('alpine');
});

Route::get('/contact', function ($json) {
    return $json;
});

Route::get('/contador', Contador::class);

Route::get('albumes-lw', Albumes::class);

require __DIR__.'/auth.php';
