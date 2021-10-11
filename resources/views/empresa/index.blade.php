@extends('templates.template')

@section('content')
    <h1 class="text-center">Empresas</h1>
    </hr>
    <div class="text-center col-8 m-auto">
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
                        <th scope="row">{{ $e->pk_empresa }}</th>
                        <td>{{ $e->razao_social }}</td>
                        <td>{{ $e->cnpj }}</td>
                        <td>{{ $e->uf }}</td>
                        <td>
                            <a href="/empresa/{{ $e->pk_empresa }}/edit">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="/empresa/delete/{{ $e->pk_empresa }}">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <div>
            <a href="/empresa/create">
                <button class="btn btn-success">Nova Empresa</button>
            </a>
        </div>
    </div>
@endsection
