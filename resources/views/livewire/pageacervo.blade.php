<div>
    <section class="content-header">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Acervo</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Cadastrar Acervos:</h3>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" wire:submit="save" enctype="multipart/form-data">
                                    @csrf
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
                                        @error('tipo')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nome_autor">Nome do autor:</label>
                                        <input type="text" name="nome_autor" wire:model="nome_autor"
                                            value="{{ old('nome_autor') }}"
                                            class="form-control  @error('nome_autor') is-invalid @enderror"
                                            placeholder="">
                                        @error('nome_autor')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- {{dd('tipo')}} --}}
                                    <div class="form-group">
                                        <label for="titulo">Titulo:</label>
                                        <input type="text" name="titulo" wire:model="titulo"
                                            value="{{ old('titulo') }}"
                                            class="form-control  @error('titulo') is-invalid @enderror" placeholder="">
                                        @error('titulo')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Local_publicacao">Local de publicação :</label>
                                        <input wire:model="Local_publicacao" type="text" name="Local_publicacao"
                                            value="{{ old('Local_publicacao') }}"
                                            class="form-control  @error('Local_publicacao') is-invalid @enderror"
                                            placeholder="">
                                        @error('Local_publicacao')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editora">Editora :</label>
                                        <input wire:model="editora" type="text" name="editora"
                                            value="{{ old('editora') }}"
                                            class="form-control  @error('editora') is-invalid @enderror" placeholder="">
                                        @error('editora')
                                            <span class="error invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="ano">Ano:</label>
                                                <input wire:model="ano" type="number" name='ano'
                                                    class="form-control  @error('ano') is-invalid @enderror"
                                                    placeholder="" value="{{ old('ano') }}">
                                                @error('ano')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="numero_pag">Número de
                                                    Páginas:</label><br>
                                                <input wire:model="numero_pag" type="number" name='numero_pag'
                                                    class="form-control  @error('numero_pag') is-invalid @enderror"
                                                    placeholder="" value="{{ old('numero_pag') }}">
                                                @error('numero_pag')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="volume">Edição:</label>
                                                <input wire:model="volume" type="number" name='volume'
                                                    class="form-control  @error('volume') is-invalid @enderror"
                                                    placeholder="" value="{{ old('volume') }}">
                                                @error('volume')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="ISBN">ISBN:</label><br>
                                                <input wire:model="ISBN" type="number" name='ISBN'
                                                    class="form-control  @error('ISBN') is-invalid @enderror"
                                                    placeholder="" value="{{ old('ISBN') }}">
                                                @error('ISBN')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="ISSN">ISSN:</label>
                                                <input wire:model="ISSN" type="number" name='ISSN'
                                                    class="form-control  @error('ISSN') is-invalid @enderror"
                                                    placeholder="" value="{{ old('ISSN') }}">
                                                @error('ISSN')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="numero_reg">Número do
                                                    Registro:</label><br>
                                                <input wire:model="numero_reg" type="number" name='numero_reg'
                                                    class="form-control  @error('numero_reg') is-invalid @enderror"
                                                    placeholder="" value="{{ old('numero_reg') }}">
                                                @error('numero_reg')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="numero_cart"> Número do
                                                    Catter:</label>
                                                <input wire:model="numero_cart" type="number" name='numero_cart'
                                                    class="form-control  @error('numero_cart') is-invalid @enderror"
                                                    placeholder="" value="{{ old('numero_cart') }}">
                                                @error('numero_cart')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="assunto">Escolha o
                                                    assunto:</label><br>
                                                <select wire:model.live="assunto"
                                                    class="form-control @error('assunto') is-invalid @enderror"
                                                    name="assunto">
                                                    <option value="">Nenhum</option>
                                                    @foreach ($assuntos as $assunto)
                                                        <option value="{{ $assunto->id }}">{{ $assunto->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('assunto')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6"
                                                    for="aquisicao">Aquisição:</label>
                                                <input wire:model="aquisicao" type="text" name="aquisicao"
                                                    value="{{ old('aquisicao') }}"
                                                    class="form-control  @error('aquisicao') is-invalid @enderror"
                                                    placeholder="">
                                                @error('aquisicao')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6"
                                                    for="CDD">CDD:</label><br>
                                                <input wire:model="CDD" type="number" name='CDD'
                                                    class="form-control  @error('CDD') is-invalid @enderror"
                                                    placeholder="" value="{{ old('CDD') }}">
                                                @error('CDD')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6"
                                                    for="CDU">CDU:</label><br>
                                                <input wire:model="CDU" type="text" name="CDU"
                                                    class="form-control @error('CDU') is-invalid @enderror" readonly>
                                                @error('CDU')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="idioma">Escolha o
                                                    idioma:</label><br>
                                                <select wire:model="idioma"
                                                    class="form-control @error('idioma') is-invalid @enderror"
                                                    name="idioma">
                                                    <option value=""
                                                        {{ old('idioma', $acervo->idioma ?? '') == '' ? 'selected' : '' }}>
                                                        Nenhum</option>
                                                    @foreach ($idiomas as $idioma)
                                                        <option value="{{ $idioma->id }}"
                                                            {{ old('idioma', $acervo->idioma ?? '') == $idioma->id ? 'selected' : '' }}>
                                                            {{ $idioma->nome }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('idioma')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="required form-label fs-6" for="exemplares">Quantidade de
                                                    Exemplares:</label>
                                                <input wire:model="exemplares" type="number" name='exemplares'
                                                    class="form-control  @error('exemplares') is-invalid @enderror"
                                                    placeholder="" value="{{ old('exemplares') }}">
                                                @error('exemplares')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="localizacao_id">Localização (Estante/Prateleira):</label>
                                                <select name="localizacao_id" wire:model="localizacao_id"
                                                    id="localizacao_id" class="form-control">
                                                    <option value="">Selecione uma Estante/Prateleira</option>
                                                    @foreach ($localizacoes as $localizacao)
                                                        <option value="{{ $localizacao->id }}">
                                                            Estante: {{ $localizacao->estante }}/ Prateleira:
                                                            {{ $localizacao->prateleira }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Anexar cópia escaneada da
                                                    bibliografia:</label>
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input @error('arquivos') is-invalid @enderror"
                                                        name="arquivos">
                                                    <label class="custom-file-label" for="customFile">
                                                    </label>
                                                    @error('arquivos')
                                                        <span class="error invalid-feedback">Por favor coloque um
                                                            Arquivo
                                                            valido</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="resenha">Resenha</label>
                                                <textarea class="form-control @error('resenha') is-invalid @enderror" wire:model="resenha" name="resenha"
                                                    id="resenha" rows="4">{{ old('resenha') }}</textarea>
                                                @error('resenha')
                                                    <span class="error invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer clearfix">
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>
