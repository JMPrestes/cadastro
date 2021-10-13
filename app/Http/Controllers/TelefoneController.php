<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TelefoneRequest;
use App\Models\Cliente;
use App\Models\Telefone;


class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->objCliente = new Cliente();
        $this->objTelefone = new Telefone();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list($id)
    {
        $cliente = $this->objCliente->find($id);
        $contato = Telefone::where('cliente_id', request('id'))->paginate(5);
        return view('telefone.index', compact('contato', 'cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cliente = $id;
        return view('telefone.cadastra', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelefoneRequest $request)
    {
        $telefone = $this->objTelefone;

        $cad = $telefone->create([
            'ddd' => $request->ddd,
            'telefone' => $request->telefone,
            'cliente_id' => $request->cliente_id,
        ]);

        if ($cad) {
            return redirect('/telefone/list/' . $request->cliente_id);
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
        $telefone = $this->objTelefone->find($id);
        return view('telefone.edita', compact('telefone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $telefone = $this->objTelefone;

        $cad = $telefone->where(['id' => $id])->update([
            'ddd' => $request->ddd,
            'telefone' => $request->telefone,
        ]);

        if ($cad) {
            return redirect('/telefone/list/' . $request->cliente_id);
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
        $del = $this->objTelefone->destroy($id);
        return ($del) ? "sim" : "não";
    }
}
