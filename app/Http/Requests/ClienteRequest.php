<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string',
            'cpf_cnpj' => 'required|cpf_cnpj',
            'data_nasc' => 'date|nullable',
            'rg' => 'numeric|nullable',
            'email' => 'required|email',
            'cep' => 'required',
            'endereco' => 'required|string',
            'numero' => 'required|string',
            'cidade' => 'required|string',
            'fk_empresa' => 'required|numeric',
        ];
    }
}
