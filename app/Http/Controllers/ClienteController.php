<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Telefone;

class ClienteController extends Controller
{
    private $objCliente;
    private $objEmpresa;
    private $objTelefone;

    private $totalPages = 5;

    public function __construct()
    {
        $this->objCliente = new Cliente();
        $this->objEmpresa = new Empresa();
        $this->objTelefone = new Telefone();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = $this->objCliente->all();
        return view('cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empresa = $this->objEmpresa->all();
        return view('cliente.cadastra', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente = $this->objCliente;
        $empresa = $this->objEmpresa->all();
        $verEmpresa = $this->objEmpresa->find($request->fk_empresa);
        $age = Carbon::parse($request->data_nasc)->diff(Carbon::now())->y;

        if ($cliente->validar_cpf($request->cpf_cnpj) && $request->cadastro == 'cpf' && $verEmpresa->uf == 'PR' && $age < 18) {
            $invalido = "Menores de idade não podem se cadastrar em empresas do Paraná";
            return view('cliente.cadastra', compact('invalido', 'empresa'));
        } else {
            $cad = $cliente->create([
                'nome' => $request->nome,
                'cpf_cnpj' => $request->cpf_cnpj,
                'data_nasc' => $request->data_nasc,
                'rg' => $request->rg,
                'email' => $request->email,
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'fk_empresa' => $request->fk_empresa,
            ]);
            if ($cad) {
                return redirect('/');
            }
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->objCliente->find($id);
        $empresa = $this->objEmpresa->all();
        return view('cliente.edita', compact('empresa', 'cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $atual = $this->objCliente;
        $cliente = $atual->find($id);
        $empresa = $this->objEmpresa->all();
        $verEmpresa = $this->objEmpresa->find($request->fk_empresa);
        $age = Carbon::parse($request->data_nasc)->diff(Carbon::now())->y;

        if ($atual->validar_cpf($request->cpf_cnpj) && $request->cadastro == 'cpf' && $verEmpresa->uf == 'PR' && $age < 18) {
            $invalido = "Menores de idade não podem se cadastrar em empresas do Paraná";
            return view('cliente.edita', compact('invalido', 'cliente', 'empresa'));
        } else {
            $cad = $atual->where(['id'=>$id])->update([
                'nome' => $request->nome,
                'cpf_cnpj' => $request->cpf_cnpj,
                'data_nasc' => $request->data_nasc,
                'rg' => $request->rg,
                'email' => $request->email,
                'cep' => $request->cep,
                'endereco' => $request->endereco,
                'numero' => $request->numero,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'fk_empresa' => $request->fk_empresa,
            ]);
            if ($cad) {
                return redirect('/');
            }
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
