<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteWebController extends Controller
{
    public function index()
    {
        $notes = Note::latest()->get();
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
            'classification' => 'required'
        ]);

        Note::create($request->all());
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
            'classification' => 'required'
        ]);

        $note->update($request->all());
        return redirect()->route('notes.index')->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Nota eliminada exitosamente.');
    }
} 