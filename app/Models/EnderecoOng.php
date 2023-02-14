<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoOng extends Model {
    use HasFactory;

    protected $fillable = [
        'cep',
        'rua',
        'bairro',
        'cidade',
        'complemento',
        'numero',
        'estado',
    ];

    /*public function usuarios(){
        return $this->hasOne(Ong::class);
    }*/

    public static function catchIdEndereco($data)
    {
        $id_Endereco = DB::table('endereco_ongs')->insertGetId($data);
        return $id_Endereco;
    }
}
