<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LlantaController;
use App\Http\Controllers\PrincipalController;
use App\Models\dato;



Route::get('/', function () {
    return view('index');
});

//rutas principales de las vistas 
Route::get('index',[PrincipalController::class,'index'])->name('index');
Route::get('admin/llantas',[PrincipalController::class,'llantas'])->name('llantas');


//Alta
Route::get('altadato',[LlantaController::class,'altadato'])->name('altadato');
Route::post('guardardato',[LlantaController::class,'guardardato'])->name('guardardato');
Route::get('admin/llantas',[LlantaController::class,'reportellanta'])->name('datos');


//Operaciones
Route::get('desactivardato/{id_llanta}', [LlantaController::class, 'desactivardato'])->name('desactivardato');        //Desactiva 
Route::get('activardato/{id_llanta}', [LlantaController::class, 'activardato'])->name('activardato');        //Activa
Route::get('eliminardato/{id_llanta}', [LlantaController::class, 'eliminardato'])->name('eliminardato'); 


//Modificaciones
Route::get('modificardato/{id_llanta?}', [LlantaController::class, 'modificardato'])->name('modificardato'); //Guarda el registro 
Route::post('guardarcambiodato', [LlantaController::class, 'guardarcambiodato'])->name('guardarcambiodato'); //Guarda el registro 

