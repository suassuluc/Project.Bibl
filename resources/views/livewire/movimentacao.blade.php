<div>
    <section class="content-header">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Movimentação de acervo</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Detalhes da movimentação</strong></h3>
                            </div>
                            <div class="card-body">
                                @if (session()->has('success'))
                                    <div id ="success-message" class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session()->has('error'))
                                    <div id= "error-messsage" class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="tipo">Tipo de Item:</label>
                                    <select class="form-control" name="tipo" id="tipo" wire:model="tipo"
                                        @error('tipo') is-invalid @enderror>
                                        <option value="">Selecione o tipo</option>
                                        @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo->nome }}"
                                                {{ old('tipo') == $tipo->nome ? 'selected' : '' }}>
                                                {{ $tipo->nome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input type="text" id="titulo" wire:model="titulo" class="form-control"
                                        placeholder="Digite o título do livro">
                                    <button class="btn btn-primary mt-2" wire:click="buscarLivro">Buscar</button>
                                </div>

                                @if ($exemplares_at !== null)
                                    <div class="mt-4">
                                        <div class="card text bg-light mb-3 text-center">
                                            <div class="card-header"><strong>{{ $titulo }}</strong></div>
                                            <div class="card-body">
                                                <h6 class="card-text text-center">
                                                    Exemplares Atuais:<strong> {{ $exemplares_at }}</strong>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group ">
                                                    <label for="destino">Destino</label>
                                                    <input type="text" id="destino" wire:model="destino"
                                                        class="form-control" rows="3" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="nv_exemplares">Novo Número de Exemplares</label>
                                                    <input type="number" id="nv_exemplares" wire:model="nv_exemplares"
                                                        class="form-control" min="0">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="observacao">Observação</label>
                                            <textarea id="observacao" wire:model="observacao" class="form-control" rows="3" placeholder=""></textarea>
                                        </div>

                                        @if ($movimentacoes)
                                            <div class="mt-4">
                                                <h5>Histórico de Movimentações</h5>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Data</th>
                                                            <th>Exemplares Antes</th>
                                                            <th>Exemplares Depois</th>
                                                            <th>Tipo</th>
                                                            <th>Destino</th>
                                                            <th>Observação</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($movimentacoes as $mov)
                                                            <tr>
                                                                <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                                                                <td>{{ $mov->exmp_ats }}</td>
                                                                <td>{{ $mov->exmp_dp }}</td>
                                                                <td>{{ $mov->tipo_mvt }}</td>
                                                                <td>{{ $mov->destino }}</td>
                                                                <td>{{ $mov->observacao }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif

                                        <button class="btn btn-primary mt-3" wire:click="atualizarExemplares">Salvar
                                            Alterações</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
