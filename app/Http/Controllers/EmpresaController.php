<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    private $objEmpresa;

    public function __construct()
    {
        $this->objEmpresa = new Empresa();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = $this->objEmpresa->all();
        return view('empresa.index', compact('empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.cadastra');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
        $empresa = $this->objEmpresa;

        $cad = $empresa->create([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'uf' => $request->uf,
        ]);

        if ($cad) {
            return redirect('/empresa');
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
        $empresa = $this->objEmpresa->find($id);
        return view('empresa.edita', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
        $empresa = $this->objEmpresa;

        $cad = $empresa->where(['id' => $id])->update([
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            'uf' => $request->uf,
        ]);

        if ($cad) {
            return redirect('/empresa');
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
        $del = $this->objEmpresa->destroy($id);
        return ($del) ? "sim" : "não";
    }
}
