<div>
    <h1>Consulta</h1>

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
            <form wire:submit.prevent="search">
                <div class="form-group">
                    <label for="parameter">Selecione o tipo de pesquisa:</label>
                    <select wire:model="parameter" id="parameter" class="form-control">
                        <option value="">Escolha uma opção</option>
                        <option value="acervo">Acervo</option>
                        <option value="caixa">Caixa</option>
                        <option value="estante">Estante</option>
                    </select>
                </div>

                @if ($parameter === 'acervo')
                    <div class="form-group">
                        <label for="query">Título do Acervo</label>
                        <input wire:model="query" type="text" id="query" class="form-control"
                            placeholder="Digite o título">
                    </div>
                    <div class="form-group">
                        <label for="year">Ano de Publicação</label>
                        <input wire:model="year" type="number" id="year" class="form-control"
                            placeholder="Digite o ano">
                    </div>
                @elseif ($parameter === 'caixa')
                    <div class="form-group">
                        <label for="query">Nome da Caixa</label>
                        <input wire:model="query" type="text" id="query" class="form-control"
                            placeholder="Digite o nome">
                    </div>
                @elseif ($parameter === 'estante')
                    <div class="form-group">
                        <label for="query">Nome da Estante</label>
                        <input wire:model="query" type="text" id="query" class="form-control"
                            placeholder="Digite o nome da estante">
                    </div>
                @endif

                {{-- <div class="form-group">
                    <label for="year">Ano</label>
                    <input wire:model="year" type="number" id="year" class="form-control" placeholder="Digite o ano">
                </div> --}}

                <div class="col text-center mb-3">
                    <button type="submit" class="btn btn-primary mt-3">Buscar</button>
                </div>
            </form>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            @if (!empty($results))
                <div class="d-flex justify-content-between">
                    <h3>Resultados</h3>
                    @if (count($results) > 0)
                        <a href="{{ route('relatorios.show', ['ids' => $results->pluck('id')->implode(',')]) }}"
                            class="btn btn-success">
                            Gerar Relatório
                        </a>
                    @endif
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Título</th>
                            @if ($parameter === 'estante')
                                <th>Prateleira</th>
                            @endif
                            <th>Nome do Autor</th>
                            <th>Resenha</th>
                            <th>Alterar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $item)
                            <tr>
                                <td>{{ $item->tipo ?? 'N/A' }}</td>
                                @if ($parameter === 'estante')
                                    <td>{{ $item->prateleira }}</td>
                                @endif
                                <td>
                                    @if ($parameter === 'acervo')
                                        {{ $item->titulo }}
                                    @elseif ($parameter === 'caixa')
                                        {{ $item->nome }}
                                    @elseif ($parameter === 'estante')
                                        {{ $item->estante }}
                                    @endif
                                </td>
                                <td>{{ $item->nome_autor ?? 'N/A' }}</td>
                                <td>{{ $item->resenha ?? 'N/A' }}</td>
                                <td><a href="{{ route('acervo.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a></td>
                                <td>
                                    <form action="{{ route('acervo.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif ($results)
                <p class="text-center">Nenhum resultado encontrado.</p>
            @endif
        </div>
    </section>
</div>
