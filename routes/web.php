<?php
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FileController;
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
Route::get('/index', [WebController::class,'index']);
Route::get('/about', [WebController::class,'aboutus']);
Route::get('/contacto', [WebController::class,'contactenos']);
Route::get('/canales', [WebController::class,'canales']);

Route::resource('file', FileController::class);


Route::get('/', function () {
    return view('auth.login');
});

Route::resource('productos', FileController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

