@extends('adminlte::page')

@section('content')
    <section class="content_header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Caixa</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('caixa.update', $caixa->id) }}">
                                @csrf
                                @method('PUT')

                                {{-- Estante --}}
                                <div class="form-group">
                                    <label for="localizacao">Estante/Prateleira:</label>
                                    <select name="localizacao_id" id="localizacao" class="form-control">
                                        @foreach($localizacoes as $localizacao)
                                            <option value="{{ $localizacao->id }}"
                                                {{ $caixa->localizacao_id == $localizacao->id ? 'selected' : '' }}>
                                                {{ $localizacao->estante }} - {{ $localizacao->prateleira }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Nome da Caixa --}}
                                <div class="form-group">
                                    <label for="nome">Nome da Caixa:</label>
                                    <input type="text" name="nome" value="{{ old('nome', $caixa->nome) }}"
                                        class="form-control @error('nome') is-invalid @enderror">
                                    @error('nome')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Resumo --}}
                                <div class="form-group">
                                    <label for="resumo">Resumo:</label>
                                    <textarea name="resumo" class="form-control @error('resumo') is-invalid @enderror" rows="4">{{ old('resumo', $caixa->resumo) }}</textarea>
                                    @error('resumo')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Botões --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                    <a href="{{ route('caixa.create') }}" class="btn btn-secondary">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
