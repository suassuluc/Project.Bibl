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
                                            <form method="POST" action="{{ route('localizacao.store') }}">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="estante">Estante:</label>
                                                    <input type="text" name="estante" value=""
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
                                                    <input type="text" name="prateleira" value=""
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

                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Estante</th>
                                                    <th class="text-center">Prateleira</th>
                                                    <th class="text-center">Alterar</th>
                                                    <th class="text-center">Excluir </th>
                                                </tr>
                                            </thead>
                                        </div>

                                        <body>
                                            <tbody>
                                                @forelse ($localizacao as $localizacoes)
                                                    <tr>
                                                        <td class="text-center">{{ $localizacoes->estante }}</td>
                                                        <td class="text-center">{{ $localizacoes->prateleira }}</td>
                                                        <td class="text-center"><a
                                                                href="{{ route('localizacao.edit', $localizacoes->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a></td>
                                                        <td class="text-center">
                                                            <form
                                                                action="{{ route('localizacao.destroy', $localizacoes->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Tem certeza que deseja excluir este item?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">Nenhum Registro encontrado
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </body>
                                    </table>
                                </div>
                                {!! $localizacao->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
