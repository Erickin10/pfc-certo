<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;

class UserEnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EnderecoUser::factory()->create([
            'estado' => 'Admin-estado',
            'cidade' => 'Admin-cidade',
            'bairro' => 'Admin-bairro',
            'rua' => 'Admin-rua',
            'complemento' => 'Admin-complemento',
            'numero' => '1010',
            'cep' => 'Admin-cep',
        ]);

    }
}
