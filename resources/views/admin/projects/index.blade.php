@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            <div class="col-12">
                <h1>
                    Tutti i miei progetti
                </h1>
            </div>
            <div class="row justify-content-center py-4">
                <div class="col-12 d-flex">
                    <a href="{{ route('admin.projects.create') }}">
                        <button class="btn btn-success">
                            Aggiungi un progetto
                        </button>
                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="mx-1 px-3">
                        @if (session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @foreach ($projects as $project)
                <div class="row">
                    <div class="fw-bold ">
                        <hr>
                        <h2>
                            {{ $project->id }}) {{ $project->name }}
                        </h2>
                        <h6>
                            Categoria: {{ $project->category ? $project->category->name : 'Nessuna Categoria' }}
                        </h6>
                        <h6>
                            Tipo: {{ $project->type ? $project->type->name : 'Nessun tipo' }}
                        </h6>
                    </div>
                    <div class="d-flex justy-content-between">
                        <div>
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary">
                                Vedi Dettagli
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning mx-2">
                                Modifica
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
