<div class="container">
    <h1 class="mb-4">Relatório</h1>

    @if (!empty($acervos))
        @foreach ($acervos as $item)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ $item->titulo ?? 'Título não informado' }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Autor:</strong> {{ $item->nome_autor ?? 'Não informado' }}</p>
                    <p><strong>Editora:</strong> {{ $item->editora ?? 'Não informado' }}</p>
                    <div class="row">
                        <div class="col-md-4"><strong>Número de Páginas:</strong>
                            {{ $item->numero_pag ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>ISBN:</strong> {{ $item->ISBN ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>ISSN:</strong> {{ $item->ISSN ?? 'Não informado' }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Código CDD:</strong> {{ $item->CDD ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Código CDU:</strong> {{ $item->CDU ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Idioma:</strong> {{ $item->idioma ?? 'Não informado' }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Local de Publicação:</strong>
                            {{ $item->Local_publicacao ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Número Catter:</strong>
                            {{ $item->numero_cart ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Ano de Publicação:</strong> {{ $item->ano ?? 'Não informado' }}
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Número de Registro:</strong>
                            {{ $item->numero_reg ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Aquisição:</strong> {{ $item->aquisicao ?? 'Não informado' }}
                        </div>
                        <div class="col-md-4"><strong>Edição:</strong> {{ $item->volume ?? 'Não informado' }}</div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4"><strong>Quantidade Disponível:</strong>
                            {{ $item->exemplares ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Assunto:</strong> {{ $item->assunto ?? 'Não informado' }}</div>
                        <div class="col-md-4"><strong>Localização:</strong>
                            {{ $item->localizacao->estante ?? 'Não informado' }} -
                            {{ $item->localizacao->prateleira ?? 'Não informado' }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <strong>Resenha:</strong>
                        <p class="text-muted">{{ $item->resenha ?? 'Não informado' }}</p>
                    </div>
                    <hr class="my-4">
                    <div class="mt-3">
                        <p><strong>Histórico de Movimentação:</strong></p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Exemplares Anterior</th>
                                    <th>Exemplares Novo</th>
                                    <th>Destino</th>
                                    <th>Observação</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($item->movimentacoes->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum Registro de movimentação
                                            encontrado.</td>
                                    </tr>
                                @else
                                    @foreach ($item->movimentacoes as $movimentacao)
                                        <tr>
                                            <td>{{ $movimentacao->exmp_ats }}</td>
                                            <td>{{ $movimentacao->exmp_dp }}</td>
                                            <td>{{ $movimentacao->destino }}</td>
                                            <td>{{ $movimentacao->observacao }}</td>
                                            <td>{{ $movimentacao->created_at->format('d/m/Y') }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
        <button onclick="window.print()" class="btn btn-success mb-3">
            Imprimir Relatório
        </button>
    @else
        <p class="text-center">Nenhum resultado encontrado.</p>
    @endif
    <style>
        @media print {
            button {
                display: none;
            }
        }
    </style>
</div>
