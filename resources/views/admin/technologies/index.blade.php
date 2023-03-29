@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            <div class="col-12">
                <h1>
                    Tutti le tecnologie
                </h1>
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
            @foreach ($technologies as $technology)
                <div class="row">
                    <div class="fw-bold ">
                        <hr>
                        <h2>
                            {{ $technology->id }}) {{ $technology->name }}
                        </h2>
                    </div>
                    <div class="d-flex justy-content-between">
                        <div>
                            <a href="{{ route('admin.technologies.show', $technology->id) }}" class="btn btn-primary">
                                Vedi Dettagli
                            </a>
                        </div>
                        <div>
                            <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-warning mx-2">
                                Modifica
                            </a>
                        </div>
                        <div>
                            <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" onsubmit="return confirm('Sei sicuro di voler eliminare questa tecnologia?')">
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
