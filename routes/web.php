<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tacheController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tache', [tacheController::class, 'liste_tache'])->name('tache.liste');
Route::post('/save', [tacheController::class, 'store'])->name('tache.save');
Route::get('/supprimer', [tacheController::class, 'destroy'])->name('tache.supprimer');
Route::get('/tache/modifier/{idTache}', [TacheController::class, 'edit'])->name('tache.modifier');
Route::post('/update', [tacheController::class, 'update'])->name('tache.update');