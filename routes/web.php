<?php
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FotografoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\DetalleOrdenController;
use App\Http\Controllers\FotoController;
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
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home2', [App\Http\Controllers\HomeController2::class, 'index'])->name('home2');


/*Auth::routes();*/

Route::resource('fotografos', FotografoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('eventos',EventoController::class);
Route::resource('albums',AlbumController::class);
Route::post('albums/verEvento',[AlbumController::class,"verEventoFoto"])->name("verEventoFoto");
Route::resource('fotos',FotoController::class);

//Route::resource('detalleOrden',DetalleOrdenController::class);

Route::get('eventos/generarCatalogo',[EventoController::class, 'generarCatalogo'])->name('eventos.generarCatalogo');

