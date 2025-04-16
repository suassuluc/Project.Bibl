@extends('adminlte::page')
@section('content')
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Caixa</h1>
                    </div>
                </div>
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
                                            <form method="POST" action="{{ route('caixa.store') }}">
                                                @csrf
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

                                                <div class="form-group">
                                                    <label for="estante">Caixa:</label>
                                                    <input type="text" name="nome" value=""
                                                        class="form-control  @error('Caixa') is-invalid @enderror"
                                                        placeholder="Nomeie a Caixa">
                                                    @error('nome')
                                                        <span class="error invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                                {{-- {{dd('tipo')}} --}}
                                                <div class="form-group">
                                                    <label for="resumo">Resumo</label>
                                                    <textarea class="form-control @error('resenha') is-invalid @enderror" name="resumo" id="resumo" rows="4">{{ old('resenha') }}</textarea>
                                                    @error('resumo')
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
                                                    <th class="text-center">Caixa</th>
                                                    <th class="text-center">Resumo</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Alterar</th>
                                                    <th class="text-center">Excluir</th>
                                                </tr>
                                            </thead>
                                        </div>

                                        <body>
                                            <tbody>
                                                @forelse ($caixa as $item)
                                                    <tr>
                                                        <td class="text-center">{{ $item->localizacao->estante }}</td>
                                                        <td class="text-center">{{ $item->localizacao->prateleira }}</td>
                                                        <td class="text-center">{{ $item->nome }}</td>
                                                        <td class="text-center">{{ $item->resumo }}</td>
                                                        <td class="text-center">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox"
                                                                    class="custom-control-input switch-status"
                                                                    id="switch{{ $item->id }}"
                                                                    data-id="{{ $item->id }}"
                                                                    {{ $item->status ? 'checked' : '' }}>
                                                                <label class="custom-control-label"
                                                                    for="switch{{ $item->id }}"></label>
                                                            </div>
                                                        </td>



                                                        <td class="text-center"><a
                                                                href="{{ route('caixa.edit', $item->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a></td>
                                                        <td class="text-center">
                                                            <form action="{{ route('caixa.destroy', $item->id) }}"
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
                                                        <td colspan="7" class="text-center">Nenhum Registro encontrado
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
                                            const checked = this.checked ? true : false;

                                            fetch(`/caixa/${id}/toggle-status`, {
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
                                                    if (data.success) {
                                                        messageDiv.innerHTML =
                                                            `<div class="alert alert-success">${data.success}</div>`;
                                                    } else if (data.error) {
                                                        messageDiv.innerHTML =
                                                            `<div class="alert alert-danger">${data.error}</div>`;
                                                    }
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
                                </script>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                {{-- {!! $localizacao->links() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
