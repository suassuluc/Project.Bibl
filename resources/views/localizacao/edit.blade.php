@extends('adminlte::page')
@section('content')
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Localização</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body p-0">
                                    <table class="table table-striped table-bordered">
                                        <div>
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST"
                                                action="{{ route('localizacao.update', $localizacao->id) }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label for="estante">Estante:</label>
                                                    <input type="text" name="estante"
                                                        value="{{ old('estante', $localizacao->estante) }}"
                                                        class="form-control  @error('estante') is-invalid @enderror"
                                                        placeholder="">
                                                    @error('prateleira')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- {{dd('tipo')}} --}}
                                                <div class="form-group">
                                                    <label for="prateleira">Prateleira:</label>
                                                    <input type="text" name="prateleira"
                                                        value="{{ old('prateleira', $localizacao->prateleira) }}"
                                                        class="form-control  @error('prateleira') is-invalid @enderror"
                                                        placeholder="">
                                                    @error('prateleira')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center mb-3">
                                                        <button type="submit" class="btn btn-primary">Alterar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </section>
                                    </section>
@endsection
