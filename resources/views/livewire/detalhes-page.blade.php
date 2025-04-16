<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>Fapema</strong></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="12"><strong>Titulo:</strong> {{ $detalhes->titulo }}</td>
                        </tr>
                        <tr>
                            <td colspan="12"><strong>Autor:</strong> {{ $detalhes->nome_autor }}</td>
                        </tr>
                        <tr>
                            <td colspan="12"><strong>Editora:</strong> {{ $detalhes->editora }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Número de Páginas:</strong> {{ $detalhes->numero_pag }}</td>
                            <td colspan="4"><strong>ISBN:</strong> {{ $detalhes->ISBN }}</td>
                            <td colspan="4"><strong>ISSN:</strong> {{ $detalhes->ISSN }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Código CDD:</strong> {{ $detalhes->CDD }}</td>
                            <td colspan="4"><strong>Código CDU:</strong> {{ $detalhes->CDU }}</td>
                            <td colspan="4"><strong>Idioma:</strong> {{ $detalhes->idioma }}</td>

                        </tr>
                        <tr>
                            <td colspan="4"><strong>Local de Publicação:</strong> {{ $detalhes->Local_publicacao }}
                            </td>
                            <td colspan="4"><strong>Número Catter:</strong> {{ $detalhes->numero_cart }}</td>
                            <td colspan="4"><strong>Ano de Publicação:</strong> {{ $detalhes->ano }}</td>

                        </tr>
                        <tr>
                            <td colspan="4"><strong>Número de Registro:</strong> {{ $detalhes->numero_reg }}</td>
                            {{-- <td colspan="3"><strong>Data do Registro:</strong></td> --}}
                            <td colspan="4"><strong>Aquisição:</strong> {{ $detalhes->aquisicao }}</td>
                            <td colspan="4"><strong>Edição:</strong> {{ $detalhes->volume }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"><strong>Quantidade Disponivel:</strong> {{ $detalhes->exemplares }}</td>
                            <td colspan="4"><strong>Assunto:</strong> {{ $detalhes->assunto }}</td>
                            <td colspan="4"><strong>Localização:</strong>
                                {{ $detalhes->localizacao->estante ?? 'Não informado' }} -
                                {{ $detalhes->localizacao->prateleira ?? 'Não informado' }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12"><strong>Resenha:</strong> {{ $detalhes->resenha }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn-print">
                    <button onclick="window.print()">:: Imprimir ::</button>
                </div>

                <div class="footer">
                    Impresso {{ now()->format('D, d M Y H:i:s') }}
                </div>
            </div>
        </div>
    </div>
    </section>
</div>
