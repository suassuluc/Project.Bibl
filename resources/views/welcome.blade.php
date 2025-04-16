@extends('adminlte::page')
@section('content')
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>BiBlioteca</h1>
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
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Tipo</th>
                                                    <th class="text-center">Título</th>
                                                    <th class="text-center">Nome do Autor</th>
                                                    <th class="text-center">Anexo</th>
                                                    <th class="text-center">Detalhar </th>
                                                    <th class="text-center">Alterar </th>
                                                    <th class="text-center">Excluir </th>

                                                </tr>
                                            </thead>
                                        </div>

                                        <body>


                                            <tbody>
                                                @forelse ($acervo as $acervos)
                                                    <tr>
                                                        <td class="text-center">{{ $acervos->tipo }}</td>
                                                        <td class="text-center">{{ $acervos->titulo }}</td>
                                                        <td class="text-center">{{ $acervos->nome_autor }}</td>
                                                        <td class="text-center"><a class= "text-center"
                                                                href="{{ asset('storage/' . $acervos->arquivos) }}"
                                                                class="btn btn-sm btn-primary" target="_blank">
                                                                <i class="fas fa-download"></i>
                                                            </a></td>
                                                        <td class="text-center"><a href="{{ route('acervo.show', ['id' => $acervos->id] )}}" class="btn btn-sm btn-primary"> <i class="fas fa-search"></i></a></td>
                                                        <td class="text-center"><a
                                                                href="{{ route('acervo.edit', $acervos->id) }}"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a></td>
                                                        <td class="text-center">
                                                            <form action="{{ route('acervo.destroy', $acervos->id) }}"
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
                                                    <td colspan="7" class="text-center">Nenhum Registro encontrado</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </body>
                                    </table>
                                </div>
                                {!! $acervo->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection
