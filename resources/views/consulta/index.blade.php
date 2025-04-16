@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pesquisa</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form method="GET" action="{{ route('consulta.search') }}">
                @csrf
                <div class="form-group">
                    <label for="parameter">Selecione o tipo de pesquisa:</label>
                    <select name="parameter" id="parameter" class="form-control">
                        <option value="">Escolha uma opção</option>
                        <option value="acervo">Acervo</option>
                        <option value="caixa">Caixa</option>
                        <option value="estante">Estante</option>
                    </select>
                </div>

                <div id="additional-fields" style="display: none;">

                </div>

                <button type="submit" class="btn btn-primary mt-3 text-center">Buscar</button>
            </form>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid text-center">
            @if ($consulta->isEmpty())
                <p>Nenhum resultado encontrado.</p>
            @else
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            @if ($parameter ==='estante')
                            <th>prateleira</th>
                            @endif
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consulta as $item)
                        <tr>
                            <td>

                                @if ($parameter === 'acervo')
                                    {{ $item->titulo }}
                                @elseif ($parameter === 'caixa')
                                    {{ $item->nome }}
                                @elseif ($parameter === 'estante')
                                    {{ $item->estante }}
                                @endif
                            </td>
                            <td>
                                @if ($parameter ==='estante')
                                {{ $item->prateleira }}

                            @endif
                        </td>
                            <td>{{ $item->resumo ?? 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>

    <script>
        document.getElementById('parameter').addEventListener('change', function() {
            const parameter = this.value;
            const additionalFields = document.getElementById('additional-fields');
            additionalFields.innerHTML = '';

            if (parameter === 'acervo') {
                additionalFields.innerHTML = `
                    <div class="form-group">
                        <label for="acervo_name">Nome do Acervo:</label>
                        <input type="text" name="acervo_name" class="form-control">
                    </div>`;
            } else if (parameter === 'caixa') {
                additionalFields.innerHTML = `
                    <div class="form-group">
                        <label for="caixa_name">Nome da Caixa:</label>
                        <input type="text" name="caixa_name" class="form-control">
                    </div>`;
            } else if (parameter === 'estante') {
                additionalFields.innerHTML = `
                    <div class="form-group">
                        <label for="estante_name">Nome da Estante:</label>
                        <input type="text" name="estante_name" class="form-control">
                    </div>`;
            }

            additionalFields.style.display = parameter ? 'block' : 'none';
        });
    </script>
@endsection
