<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ong extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_Endereco',
        'name',
        'email',
        'description',
        'phone',
        'cnpj',
        'aproved'
    ];

    /*public function endereco(){
        return $this->belongTo(Endereco::class);
    }*/

}
