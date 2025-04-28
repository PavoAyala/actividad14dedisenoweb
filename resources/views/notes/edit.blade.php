@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Editar Nota</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('notes.update', $note) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title', $note->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                           id="author" name="author" value="{{ old('author', $note->author) }}" required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="classification" class="form-label">Clasificación</label>
                    <select class="form-select @error('classification') is-invalid @enderror" 
                            id="classification" name="classification" required>
                        <option value="">Selecciona una clasificación</option>
                        <option value="Personal" {{ $note->classification == 'Personal' ? 'selected' : '' }}>Personal</option>
                        <option value="Trabajo" {{ $note->classification == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                        <option value="Estudio" {{ $note->classification == 'Estudio' ? 'selected' : '' }}>Estudio</option>
                        <option value="Recordatorio" {{ $note->classification == 'Recordatorio' ? 'selected' : '' }}>Recordatorio</option>
                    </select>
                    @error('classification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Contenido</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" 
                              id="body" name="body" rows="5" required>{{ old('body', $note->body) }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Actualizar Nota
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 