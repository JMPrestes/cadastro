@extends('templates.template')

@section('content')
    <h1 class="text-center">Empresas</h1>
    </hr>
    <div class="text-center ol-8 m-4">
        <a href="/empresa/create">
            <button id="empresa" class="btn btn-success">Nova Empresa</button>
        </a>
    </div>
    <div class="text-center col-8 m-auto">
        @csrf
        <input type="hidden" id="direct" name="empresa">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope=" col">#</th>
                    <th scope="col">Razão Social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">UF</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresa as $e)
                    <tr>
                        <th scope="row">{{ $e->id }}</th>
                        <td>{{ $e->razao_social }}</td>
                        <td>{{ $e->cnpj }}</td>
                        <td>{{ $e->uf }}</td>
                        <td>
                            <a href="/empresa/{{ $e->id }}/edit">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="/empresa/{{ $e->id }}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <span>
            {{ $empresa->links() }}
        </span>
    </div>
@endsection
