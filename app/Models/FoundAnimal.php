<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundAnimal extends Model {

    use HasFactory;

    protected $fillable = [

        'type_Animal',
        'name_Animal',
        'breed_Animal',
        'age_Animal',
        'gender_Animal',
        'size_Animal',
        'img_Animal',
        'id_Usuario',
        'post_Description',
        //'bounty_Animal',
        'color_Animal',
        'local_animal',
        'local_Found_Animal',
        //'local_Lost_Animal'
        'aproved'
    ];
}
