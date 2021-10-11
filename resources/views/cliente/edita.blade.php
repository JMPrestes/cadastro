@extends('templates.viacep')

@section('content')
    <h1 class="text-center">Cadastrar Cliente</h1>
    </hr>

    @if (isset($errors) && count($errors) > 0)
        <div class="text-center mx-4 mb-4 py-2 alert-danger">
            @foreach ($errors->all() as $erro)
                {{ $erro }}
            @endforeach
        </div>
    @endif

    @if (isset($invalido))
        <div class="text-center mx-4 mb-4 py-2 alert-danger">
            {{ $invalido }}
        </div>
    @endif


    <form name="formEdit" id="formEdit" method="post" action="{{ url("/cliente/$cliente->pk_cliente") }}"
        class="row g-3 mx-4">
        @csrf
        <input type="hidden" name="pk_cliente" value="{{ $cliente->pk_cliente }}">
        <div class="col-12">
            <label for="inputNome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="inputNome" name="nome" value="{{ $cliente->nome }}"
                placeholder="Seu nome aqui..." required>
        </div>
        <div class="col-md-8">
            <label for="inputEmail" class="form-label">Tipo de Cadastro: </label><br>
            <input type="radio" class="mr-2" onChange="modCadastro(this)" name="cadastro" value="cpf"
                checked>CPF</input>
            <input type="radio" class="mr-2" onChange="modCadastro(this)" name="cadastro"
                value="cnpj">CNPJ</input>

        </div>
        <div class="col-8">
            <label for="inputCad" class="form-label">CPF/CNPJ</label>
            <input type="text" class="form-control" id="inputCad" name="cpf_cnpj" value="{{ $cliente->cpf_cnpj }}"
                placeholder="Seu CPF/CNPJ..." display="block" required>
        </div>
        <div class="col-6 oculta">
            <label for="inputNasc" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control limpa" inputNasc" name="data_nasc" value="{{ $cliente->data_nasc }}"
                placeholder="Sua Data de Nascimento" display="block" required>
        </div>
        <div class="col-6 oculta">
            <label for="inputRg" class="form-label">RG</label>
            <input type="text" class="form-control limpa" id="inputRg" name="rg" value="{{ $cliente->rg }}"
                placeholder="Seu RG" required>
        </div>
        <div class="col-md-8">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $cliente->email }}"
                placeholder="exemplo@exemplo.com" required>
        </div>
        <div class="col-md-4">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="form-control" id="cep" name="cep" value="{{ $cliente->cep }}"
                placeholder="00000-000" required>
        </div>
        <div class="col-10">
            <label for="rua" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="rua" name="endereco" value="{{ $cliente->endereco }}"
                placeholder="Rua das Laranjeiras" readonly="readonly">
        </div>
        <div class="col-md-2">
            <label for="inputNumero" class="form-label">Número</label>
            <input type="text" class="form-control" id="inputNumero" name="numero" value="{{ $cliente->numero }}"
                placeholder="Número da residência" required>
        </div>
        <div class="col-10">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" class="form-control" id="cidade" name="cidade" value="{{ $cliente->cidade }}"
                placeholder="Curiuva" readonly="readonly" required>
        </div>
        <div class="col-2">
            <label for="uf" class="form-label">Estado</label>
            <input type="text" class="form-control" id="uf" name="estado" value="{{ $cliente->estado }}"
                placeholder="PR, SP..." readonly="readonly" required>
        </div>
        <div class="col-md-4">
            <label for="inputCompany" class="form-label">Empresa</label>
            <select class="form-select" id="inputCompany" name="fk_empresa">
                <option value="0">Empresa em que trabalha...</option>
                @foreach ($empresa as $e)
                    <option value="{{ $e->pk_empresa }}" @if ($cliente->fk_empresa == $e->pk_empresa)
                        selected
                @endif
                >{{ $e->razao_social }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>

@endsection
