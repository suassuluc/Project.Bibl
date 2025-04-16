@extends('adminlte::page')
@section('content')
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Constante</h1>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body p-0">
                                    <table class="table table-striped table-bordered">
                                        <div>
                                            <div id="message-container">
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
                                            </div>
                                            <form method="POST" action="{{ route('constante.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="required form-label fs-6" for="constante">Escolha a
                                                        constante</label><br>
                                                    <select class="form-control" name="constante">
                                                        <option value="">Nenhum</option>
                                                        <option value="Assunto">Assunto</option>
                                                        <option value="Idioma">Idioma</option>
                                                        <option value="Tipologia">Tipologia</option>
                                                    </select>
                                                    @error('')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="estante">Nome:</label>
                                                    <input type="text" name="nome" value=""
                                                        class="form-control  @error('nome') is-invalid @enderror"
                                                        placeholder="Nomeie a Constante">
                                                    @error('nome')
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
                                                    <th class="text-center">Constante</th>
                                                    <th class="text-center">Nome</th>
                                                    <th class="text-center">Codigo</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Habilitar Arquivos</th>
                                                </tr>
                                            </thead>
                                        </div>

                                        <body>
                                            <tbody>
                                                @forelse ($cons as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $item->constante }}</td>
                                                        <td class="text-center">{{ $item->nome }}</td>
                                                        <td class="text-center">{{ $item->codigo }}</td>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox"
                                                                    class="custom-control-input switch-status"
                                                                    id="switchStatus{{ $item->id }}"
                                                                    data-id="{{ $item->id }}"
                                                                    {{ $item->status ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="switchStatus{{ $item->id }}"></label>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox"
                                                                    class="custom-control-input switch-arquivos"
                                                                    id="switchArquivos{{ $item->id }}"
                                                                    data-id="{{ $item->id }}"
                                                                    {{ $item->arquivos ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="switchArquivos{{ $item->id }}"></label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">Nenhum Registro encontrado
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </body>
                                    </table>
                                </div>
                                <script>
                                    document.querySelectorAll('.switch-status').forEach(switchEl => {
                                        switchEl.addEventListener('change', function() {
                                            const id = this.getAttribute('data-id');
                                            const checked = this.checked;

                                            fetch(`/constante/${id}/toggle-status`, {
                                                    method: 'PUT',
                                                    headers: {
                                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                            .getAttribute('content'),
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        status: checked
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    const messageDiv = document.querySelector('#message-container');
                                                    messageDiv.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
                                                    setTimeout(() => {
                                                        messageDiv.innerHTML = '';
                                                    }, 5000);
                                                })
                                                .catch(error => {
                                                    const messageDiv = document.querySelector('#message-container');
                                                    messageDiv.innerHTML =
                                                        `<div class="alert alert-danger">Erro ao atualizar o status.</div>`;
                                                    console.error('Erro ao atualizar status:', error);
                                                    setTimeout(() => {
                                                        messageDiv.innerHTML = '';
                                                    }, 5000);
                                                });
                                        });
                                    });
                                    document.querySelectorAll('.switch-arquivos').forEach(switchEl => {
                                        switchEl.addEventListener('change', function() {
                                            const id = this.getAttribute('data-id');
                                            const checked = this.checked;

                                            fetch(`/constante/${id}/toggle-arquivos`, {
                                                    method: 'PUT',
                                                    headers: {
                                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                            .getAttribute('content'),
                                                        'Content-Type': 'application/json'
                                                    },
                                                    body: JSON.stringify({
                                                        arquivos: checked
                                                    })
                                                })
                                                .then(response => response.json())
                                                .then(data => {
                                                    const messageDiv = document.querySelector('#message-container');
                                                    messageDiv.innerHTML = `<div class="alert alert-success">${data.success}</div>`;
                                                    setTimeout(() => {
                                                        messageDiv.innerHTML = '';
                                                    }, 5000);
                                                })
                                                .catch(error => {
                                                    const messageDiv = document.querySelector('#message-container');
                                                    messageDiv.innerHTML =
                                                        `<div class="alert alert-danger">Erro ao atualizar a opção de arquivos.</div>`;
                                                    console.error('Erro ao atualizar arquivos:', error);
                                                    setTimeout(() => {
                                                        messageDiv.innerHTML = '';
                                                    }, 5000);
                                                });
                                        });
                                    });
                                    document.querySelector('select[name="constante"]').addEventListener('change', function() {
                                        const constante = this.value;
                                        fetch(`/constante/filtrar?constante=${constante}`)
                                            .then(response => response.json())
                                            .then(data => {
                                                const tbody = document.querySelector('tbody');
                                                tbody.innerHTML = '';
                                                if (data.length) {
                                                    data.forEach(item => {
                                                        tbody.innerHTML += `
                            <tr>
                                <td class="text-center">${item.constante}</td>
                                <td class="text-center">${item.nome}</td>
                                <td class="text-center">${item.codigo}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input switch-status"
                                            id="switch${item.id}" data-id="${item.id}"
                                            ${item.status ? 'checked' : ''}>
                                        <label class="custom-control-label" for="switch${item.id}"></label>
                                    </div>
                                </td>
                            </tr>`;
                                                    });
                                                } else {
                                                    tbody.innerHTML =
                                                        '<tr><td colspan="5" class="text-center">Nenhum Registro encontrado</td></tr>';
                                                }
                                            })
                                            .catch(error => console.error('Erro ao filtrar:', error));
                                    });
                                </script>
                                {{-- {!! $localizacao->links() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
