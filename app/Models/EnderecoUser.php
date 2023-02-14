<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnderecoUser extends Model {
    use HasFactory;

    protected $fillable = [
        'cep',
        'rua',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'numero',
    ];

    public function usuarios(){
        return $this->hasMany(User::class);
    }

    public static function catchIdEndereco($data)
    {
        $id_Endereco = DB::table('endereco_users')->insertGetId($data);
        return $id_Endereco;
    }

}
