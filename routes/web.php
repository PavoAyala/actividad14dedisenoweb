<?php

use App\Http\Controllers\NoteWebController;

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::get('/notes', [NoteWebController::class, 'index'])->name('notes.index');
Route::get('/notes/create', [NoteWebController::class, 'create'])->name('notes.create');
Route::post('/notes', [NoteWebController::class, 'store'])->name('notes.store');
Route::get('/notes/{note}/edit', [NoteWebController::class, 'edit'])->name('notes.edit');
Route::put('/notes/{note}', [NoteWebController::class, 'update'])->name('notes.update');
Route::delete('/notes/{note}', [NoteWebController::class, 'destroy'])->name('notes.destroy'); 