@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="mx-1 px-3">
                    <h1>Aggiungi nuovo progetto</h1>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="mx-1 px-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="mx-1 px-3">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="py-3">
                            <label class="py-1" for="name">Nome progetto</label>
                            <input name="name" type="text" class="form-control" id="name"
                                placeholder="Inserisci il nome del progetto" required maxlength="30"
                                value="{{ old('name') }}">
                        </div>
                        <div class="py-3">
                            <label class="py-1" for="description">Descrizione del progetto</label>
                            <input name="description" type="text" class="form-control" id="description"
                                placeholder="Inserisci descrizione del progetto" required maxlength="200"
                                value="{{ old('description') }}">
                        </div>
                        <div class="py-3">
                            <label class="py-1" for="link">Link al progetto</label>
                            <input name="link" type="text" class="form-control" id="link"
                                placeholder="Inserisci link al progetto" required maxlength="500"
                                value="{{ old('link') }}">
                        </div>
                        <div class="py-3">
                            <label class="py-1" for="imagn">Immagine in evidenza</label>
                            <input name="imagn" type="file" class="form-control" id="imagn"
                                placeholder="Inserisci immagine al progetto"
                                accept="image/*">
                        </div>
                        <div class="py-3">
                            <label for="category_id">
                                Categoria
                            </label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">
                                    Nessuna categoria
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="py-3">
                            <label for="type_id">
                                Tipo
                            </label>
                            <select name="type_id" id="type_id" class="form-control">
                                <option value="">
                                    Nessuna tipo
                                </option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"> {{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="py-3">
                            <button class="btn btn-success">
                                Crea progetto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
