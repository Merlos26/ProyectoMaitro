<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;


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
    return view('welcome');
});

/*
Route::get('/Persona', function () {
    return view('Persona.index');
});

Route::get('/Persona/create',[PersonaController::class,'create']);//se accede al controlador y al metodo create

*/

Route::resource('Persona', PersonaController::class)->middleware('auth');//con esta instruccion se puede acceder a todas las rutas 
//de la clase       middleware sirve para restringir, si no existe la autenticacion no permitira acceder a esa ruta

Auth::routes(['register'=>false,'reset'=>false]);//con ['register'=>false,'reset'=>false] se quita la opcion de registro y de olvide la cotrase;a 

Route::get('/home', [PersonaController::class, 'index'])->name('home');

route::group(['middleware'=>'auth'],function(){
    Route::get('/', [PersonaController::class, 'index'])->name('home');
});


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
