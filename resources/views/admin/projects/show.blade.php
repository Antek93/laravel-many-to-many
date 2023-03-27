@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
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
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="mx-1 px-3">
                    <span>
                        Nome Progetto:
                    </span>
                    <span class="fw-bold">
                        {{ $project->name }}
                    </span>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <div class="my-1 px-3">
                    Descrizione del progetto:
                </div>
                <div class="mx-1 px-3 fw-bold">
                    @for ($i = 0; $i <10; $i++)
                        {{ $project->description }}
                    @endfor
                </div>
                <div class="my-4 px-3">
                    Categoria: {{ $project->category ? $project->category->name : 'nessuna categoria' }}
                </div>
                <div class="my-4 px-3">
                    Tipo: {{ $project->type ? $project->type->name : 'nessun tipo' }}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 py-5">
                <div class="mx-1 px-3 fw-bold">
                    @if ($project->imagn)
                        <div>
                            <img src="{{ asset('storage/'.$project->imagn) }}" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-1 px-3">
                    <a href="{{ route('admin.projects.index') }}">
                        <button class="btn btn-danger">
                            Return
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
