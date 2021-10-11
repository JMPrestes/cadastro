@extends('templates.viacep')

@section('content')
    <h1 class="text-center">Cadastrar Empresa</h1>
    </hr>

    @if (isset($errors) && count($errors) > 0)
        <div class="text-center mx-4 mb-4 py-2 alert-danger">
            @foreach ($errors->all() as $erro)
                {{ $erro }}
            @endforeach
        </div>
    @endif


    <form name="formCadEmpresa" id="formCadEmpresa" method="post" action={{ url('/empresa') }} class="row g-3 mx-4">
        @csrf
        <div class="col-12">
            <label for="inputNome" class="form-label">Razão Social</label>
            <input type="text" class="form-control" id="inputNome" name="razao_social" placeholder="Seu nome aqui..."
                required>
        </div>
        <div class="col-10">
            <label for="inputCnpj" class="form-label">CNPJ</label>
            <input type="text" class="form-control" id="inputCnpj" name="cnpj" placeholder="Seu CNPJ..." required>
        </div>
        <div class="col-2">
            <label for="inputUf" class="form-label">UF</label>
            <input type="text" class="form-control" id="inputUf" name="uf" placeholder="Sigla" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection
