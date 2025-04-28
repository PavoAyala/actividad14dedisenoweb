@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mis Notas</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Nueva Nota
        </a>
    </div>

    @if($notes->isEmpty())
        <div class="alert alert-info">
            No hay notas disponibles. ¡Crea una nueva!
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($notes as $note)
                <div class="col">
                    <div class="card h-100 note-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $note->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                <i class="fas fa-user me-1"></i>{{ $note->author }}
                            </h6>
                            <p class="card-text note-body">{{ Str::limit($note->body, 150) }}</p>
                            <span class="badge bg-info mb-2">{{ $note->classification }}</span>
                            <div class="text-muted small mb-3">
                                <i class="fas fa-clock me-1"></i>
                                {{ $note->created_at->format('d/m/Y H:i') }}
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit me-1"></i>Editar
                                </a>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">
                                        <i class="fas fa-trash-alt me-1"></i>Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection 