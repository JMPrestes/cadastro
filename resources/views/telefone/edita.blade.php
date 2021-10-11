@extends('templates.viacep')

@section('content')
    <h1 class="text-center">Editar Telefone</h1>
    </hr>

    @if (isset($errors) && count($errors) > 0)
        <div class="text-center mx-4 mb-4 py-2 alert-danger">
            @foreach ($errors->all() as $erro)
                {{ $erro }}
            @endforeach
        </div>
    @endif

    <form name="formEditTel" id="formEditTel" method="post" action="{{ url("/telefone/$telefone->pk_telefone") }}"
        class="row g-3 mx-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="fk_cliente" value="{{ $telefone->pk_telefone }}">
        <div class="col-2">
            <label for="cidade" class="form-label">DDD</label>
            <input type="text" class="form-control" id="cidade" name="ddd" value="{{ $telefone->ddd }}" placeholder="DDD"
                required>
        </div>
        <div class="col-10">
            <label for="uf" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="uf" name="telefone" value="{{ $telefone->telefone }}"
                placeholder="Celular ou Fixo" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection
