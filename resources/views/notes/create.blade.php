@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Crear Nueva Nota</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" 
                           id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Autor</label>
                    <input type="text" class="form-control @error('author') is-invalid @enderror" 
                           id="author" name="author" value="{{ old('author') }}" required>
                    @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="classification" class="form-label">Clasificación</label>
                    <input type="text" class="form-control @error('classification') is-invalid @enderror" 
                           id="classification" name="classification" value="{{ old('classification') }}" required>
                    @error('classification')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Contenido</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" 
                              id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
                    @error('body')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Volver
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Guardar Nota
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 