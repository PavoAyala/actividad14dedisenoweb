<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteWebController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('created_at', 'desc')->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'classification' => 'required',
        ]);

        Note::create([
            'title' => $request->title,
            'author' => $request->author,
            'date_time' => now(),
            'body' => $request->body,
            'classification' => $request->classification,
        ]);

        return redirect()->route('notes.index')->with('success', 'Nota creada exitosamente.');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'classification' => 'required',
        ]);

        $note->update([
            'title' => $request->title,
            'author' => $request->author,
            'body' => $request->body,
            'classification' => $request->classification,
        ]);

        return redirect()->route('notes.index')->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Nota eliminada exitosamente.');
    }
} 