<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostImage extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_Img',
        'id_Perdido'

    ];
}
