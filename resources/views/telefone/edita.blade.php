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

    <form name="formEditTel" id="formEditTel" method="post" action="{{ url("/telefone/$telefone->id") }}"
        class="row g-3 mx-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="cliente_id" value="{{ $telefone->cliente_id }}">
        <div class="col-2">
            <label for="cidade" class="form-label">DDD</label>
            <input type="text" class="form-control" id="cidade" name="ddd" value="{{ $telefone->ddd }}" placeholder="DDD"
                required>
        </div>
        <div class="col-10">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $telefone->telefone }}"
                placeholder="Celular ou Fixo" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>

@endsection
