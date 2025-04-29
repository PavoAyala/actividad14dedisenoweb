<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Support\Facades\Route;

// Ruta de prueba
Route::get('/', function () {
    return response()->json(['status' => 'success', 'message' => 'API funcionando']);
});

// Rutas de la API
Route::get('/notes', [NoteController::class, 'index']);
Route::post('/notes', [NoteController::class, 'store']);
Route::get('/notes/{note}', [NoteController::class, 'show']);
Route::put('/notes/{note}', [NoteController::class, 'update']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']); 