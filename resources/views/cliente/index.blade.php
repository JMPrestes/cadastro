@extends('templates.template')



@section('content')
    <h1 class="text-center">Clientes</h1>
    </hr>
    <div class="text-center ol-8 m-auto">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF/CNPJ</th>
                    <th scope="col">Nascimento</th>
                    <th scope="col">RG</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Endereco</th>
                    <th scope="col">Naturalidade</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Contatos</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cliente as $c)
                    @php
                        $empresa = $c->find($c->id)->RelEmpresa;
                    @endphp
                    <tr>
                        <th scope="row">{{ $c->id }}</th>
                        <td>{{ $c->nome }}</td>
                        <td>{{ $c->cpf_cnpj }}</td>
                        <td>{{ !is_null($c->data_nasc) ? date('d/m/Y', strtotime($c->data_nasc)) : $c->data_nasc }}</td>
                        <td>{{ $c->rg }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->cep }}</td>
                        <td>{{ $c->endereco }}, {{ $c->numero }}</td>
                        <td>{{ $c->cidade }}/{{ $c->estado }}</td>
                        <td>{{ $empresa->razao_social }}</td>
                        <td>
                            <a href="/telefone/list/{{ $c->id }}">
                                <button class="btn btn-dark">Listar Contatos</button>
                        </td>
                        <td>
                            <a href="/cliente/{{ $c->id }}/edit">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="/cliente/delete/{{ $c->id }}">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        <div>
            <a href="/cliente/create">
                <button class="btn btn-success mb-8">Novo Cliente</button>
            </a>
        </div>
    </div>
@endsection
