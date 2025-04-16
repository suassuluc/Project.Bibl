@extends('adminlte::page')
@section('content')
    <section class="content-header">
        <h1>Editar Acervo</h1>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('acervo.update', $acervo->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="tipo">Tipo de Item:</label>
                                    <select class="form-control" name="tipo" id="tipo"
                                        @error('tipo') is-invalid @enderror >
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
                                    <label for="titulo">Título</label>
                                    <input type="text" name="titulo"
                                        class="form-control @error('titulo') is-invalid @enderror"
                                        value="{{ old('titulo', $acervo->titulo) }}">
                                    @error('titulo')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nome_autor">Nome do Autor</label>
                                    <input type="text" name="nome_autor"
                                        class="form-control @error('nome_autor') is-invalid @enderror"
                                        value="{{ old('nome_autor', $acervo->nome_autor) }}">
                                    @error('nome_autor')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Local_publicacao">Local de publicação :</label>
                                    <input type="text" name="Local_publicacao"
                                        value="{{ old('Local_publicacao', $acervo->Local_publicacao) }}"
                                        class="form-control @error('Local_publicacao') is-invalid @enderror" placeholder="">
                                    @error('Local_publicacao')
                                        <span class="error invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="editora">Editora :</label>
                                    <input type="text" name="editora" value="{{ old('editora', $acervo->editora) }}"
                                        class="form-control @error('editora') is-invalid @enderror" placeholder="">
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
                                            <input type="number" name='ano'
                                                class="form-control @error('ano') is-invalid @enderror" placeholder=""
                                                value="{{ old('ano', $acervo->ano) }}">
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
                                            <input type="number" name='numero_pag'
                                                class="form-control @error('numero_pag') is-invalid @enderror"
                                                placeholder="" value="{{ old('numero_pag', $acervo->numero_pag) }}">
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
                                            <label class="required form-label fs-6" for="volume">Volume:</label>
                                            <input type="number" name='volume'
                                                class="form-control @error('volume') is-invalid @enderror" placeholder=""
                                                value="{{ old('volume', $acervo->volume) }}">
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
                                            <input type="number" name='ISBN'
                                                class="form-control @error('ISBN') is-invalid @enderror" placeholder=""
                                                value="{{ old('ISBN', $acervo->ISBN) }}">
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
                                            <input type="number" name='ISSN'
                                                class="form-control @error('ISSN') is-invalid @enderror" placeholder=""
                                                value="{{ old('ISSN', $acervo->ISSN) }}">
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
                                            <input type="number" name='numero_reg'
                                                class="form-control @error('numero_reg') is-invalid @enderror"
                                                placeholder="" value="{{ old('numero_reg', $acervo->numero_reg) }}">
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
                                            <input type="number" name='numero_cart'
                                                class="form-control @error('numero_cart') is-invalid @enderror"
                                                placeholder="" value="{{ old('numero_cart', $acervo->numero_cart) }}">
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
                                            <select class="form-control @error('assunto') is-invalid @enderror"
                                                name="assunto">
                                                <option value=""
                                                    {{ old('assunto', $acervo->assunto ?? '') == '' ? 'selected' : '' }}>
                                                    Nenhum</option>
                                                @foreach ($assuntos as $assunto)
                                                    <option value="{{ $assunto->id }}"
                                                        {{ old('assunto', $acervo->assunto ?? '') == $assunto->id ? 'selected' : '' }}>
                                                        {{ $assunto->nome }}
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
                                            <label class="required form-label fs-6" for="aquisicao">Aquisição:</label>
                                            <input type="number" name='aquisicao'
                                                class="form-control @error('aquisicao') is-invalid @enderror"
                                                placeholder="" value="{{ old('aquisicao', $acervo->aquisicao) }}">
                                            @error('aquisicao')
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="required form-label fs-6" for="CDD">CDD:</label><br>
                                            <input type="number" name='CDD'
                                                class="form-control @error('CDD') is-invalid @enderror" placeholder=""
                                                value="{{ old('CDD', $acervo->CDD) }}">
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
                                            <label class="required form-label fs-6" for="CDU">CDU:</label>
                                            <input type="number" name='CDU'
                                                class="form-control @error('CDU') is-invalid @enderror" placeholder=""
                                                value="{{ old('CDU', $acervo->CDU) }}">
                                            @error('CDU')
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="required form-label fs-6" for="idioma">Escolha o
                                                idioma:</label><br>
                                            <select class="form-control @error('idioma') is-invalid @enderror"
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
                                            <input type="number" name='exemplares'
                                                class="form-control @error('exemplares') is-invalid @enderror"
                                                placeholder="" value="{{ old('exemplares', $acervo->exemplares) }}">
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
                                            <select name="localizacao_id" id="localizacao_id" class="form-control">
                                                <option value="">Selecione uma Estante/Prateleira</option>
                                                @foreach ($localizacoes as $localizacao)
                                                    <option value="{{ $localizacao->id }}">
                                                        Estante: {{ $localizacao->estante }}/ Prateleira: {{ $localizacao->prateleira }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Anexar cópia escaneada da bibliografia:</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="arquivos">
                                                <label class="custom-file-label" for="customFile">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="resenha">Resenha</label>
                                            <textarea class="form-control @error('resenha') is-invalid @enderror" name="resenha" id="resenha" rows="4">{{ old('resenha', $acervo->resenha) }}</textarea>
                                            @error('resenha')
                                                <span class="error invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
