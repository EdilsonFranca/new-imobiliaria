<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LengthException;

class Imovel extends Model{
    protected $table = 'tbImoveis';
    public $timestamps = false;
    protected $fillable  = array(
        'id', 'titulo', 'tipo', 'transacao', 'dormitorio', 'suite', 'vaga',
        'banheiro', 'area', 'condominio', 'valor', 'destaque', 'descricao', 'imovel_para', 'statusDoImovel', 'proprietario_id', 'endereco_id'
    );

    public function endereco(){
        return $this->hasOne('App\Endereco', 'id_endereco');
    }
    public function proprietario(){
        return $this->hasOne('App\Proprietario', 'id_proprietario');
    }

    public function fotos(){
        return $this->hasMany('App\Foto', 'imovel_id');
    }

    public function search(array $data){

       return $this->join('tbEnderecos', 'tbImoveis.endereco_id', '=', 'tbEnderecos.id_endereco')->where(function ($query) use ($data) {
            if (isset($data['localizacao'])) $query->where('tbEnderecos.bairro','like', '%'.$data['localizacao'].'%');

            if (isset($data['tipo'])) $query->where('tbImoveis.tipo', $data['tipo']);
            if (isset($data['transacoes']))         
            if (count($data['transacoes'])  > 1) :
                $query->where(function ($query) use ($data) {
                    foreach ($data['transacoes'] as  $key => $transacao) :
                        $query->orWhere('tbImoveis.transacao', $transacao);
                    endforeach;
                });
            else : $query->where('tbImoveis.transacao', $data['transacoes']);
            endif;
            if (isset($data['quarto'])) $query->where("tbImoveis.dormitorio", $data['quarto']);
            if (isset($data['vaga'])) $query->where('tbImoveis.vaga', $data['vaga']);
            if (isset($data['suite'])) $query->where('tbImoveis.suite', $data['suite']);
            if (isset($data['banheiro'])) $query->where('tbImoveis.banheiro', $data['banheiro']);
            if (isset($data['minValue1'])) $query->whereBetween('tbImoveis.valor', [$data['minValue1'],$data['maxValue1']]);
            if (isset($data['minValue2'])) $query->whereBetween('tbImoveis.area', [$data['minValue2'],$data['maxValue2']]);
            if (isset($data['statusDoImovel'])) $query->where("tbImoveis.statusDoImovel", $data['statusDoImovel']);
        })->paginate(9);
        /*->paginate(9);
    ->toSql();
       dd($busca); */
    }
}
