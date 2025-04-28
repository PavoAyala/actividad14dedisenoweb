@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-book-open"></i> Mis Notas</h1>
        <a href="{{ route('notes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus btn-icon"></i> Nueva Nota
        </a>
    </div>

    <div class="row">
        @forelse($notes as $note)
            <div class="col-md-4 mb-4">
                <div class="card h-100 note-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $note->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <i class="fas fa-user btn-icon"></i> {{ $note->author }}
                        </h6>
                        <p class="card-text note-body">{{ Str::limit($note->body, 100) }}</p>
                        <div class="mb-2">
                            <span class="badge bg-info">{{ $note->classification }}</span>
                        </div>
                        <p class="text-muted">
                            <i class="fas fa-calendar btn-icon"></i> 
                            {{ \Carbon\Carbon::parse($note->date_time)->format('d/m/Y H:i') }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit btn-icon"></i> Editar
                            </a>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">
                                    <i class="fas fa-trash btn-icon"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle btn-icon"></i> No hay notas disponibles. 
                    <a href="{{ route('notes.create') }}" class="alert-link">Crea tu primera nota</a>.
                </div>
            </div>
        @endforelse
    </div>
@endsection 