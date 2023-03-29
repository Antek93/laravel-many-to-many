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
                        Nome Tecnologia:
                    </span>
                    <span class="fw-bold">
                        {{ $technology->name }}
                    </span>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12">
                <div class="mx-1 px-3">
                    <a href="{{ route('admin.technologies.index') }}">
                        <button class="btn btn-danger">
                            Return
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
