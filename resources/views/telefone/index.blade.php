@extends('templates.template')

@section('content')
    <h1 class="text-center">Contatos - Cliente {{ $cliente->nome }}</h1>
    </hr>
    <div class="text-center col-8 m-auto">
        @csrf
        <input type="hidden" id="direct" name="{{ $cliente->id }}">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">DDD</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contato as $c)
                    <tr>
                        <td>{{ $c->ddd }}</td>
                        <td>{{ $c->telefone }}</td>
                        <td>
                            <a href="/telefone/{{ $c->id }}/edit">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="/telefone/{{ $c->id }}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="/telefone/create/{{ $cliente->id }}">
                <button class="btn btn-success">Novo Contato</button>
            </a>
        </div>
    </div>
@endsection
