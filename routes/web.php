<?php

use App\Http\Controllers\AlbumController;
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

Route::get('/albumes/{album}/descargar', [AlbumController::class, 'descargar'])
    ->name('albumes-descargar');

Route::get('/correo', function () {
    Mail::to('ricardo@iesdonana.org')->send(new Prueba('Manolito'));
});

require __DIR__.'/auth.php';
