<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImoveisRequest extends FormRequest{

    public function authorize(){
        return true;
    }

  
    public function rules(){
        return [
            'titulo' => 'required|max:255',
            'suite' => 'required|numeric',
            'vaga' => 'required|numeric',
            'dormitorio' => 'required|numeric',
            'banheiro' => 'required|numeric',
            'tipo' => 'required|max:255',
            'transacao' => 'required|max:255',
            'area' => 'required|max:255',
            'valor' => 'required|numeric',
            'descricao' => 'required|max:255',
            'numero' => 'required|max:255',
            'logradouro_tipo' => 'required|max:255',
            'logradouro_nome' => 'required|max:255',
            'bairro' => 'required|max:255',
            'zona' => 'required|max:255',
            'cep' => 'required|max:255',
            'cidade' => 'required|max:255',
            'lat' => 'required|max:255',
            'lng' => 'required|max:255',
            'nome' => 'required|max:255',
            'telefone' => 'required|max:255',
            'email' => 'required|max:255',
            ];
    }

    public function messages(){
        return [
             'required' => 'o campo :attribute  não pode ser vazio.',
        ];
        }
}
