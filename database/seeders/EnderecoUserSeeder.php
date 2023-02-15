<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnderecoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EnderecoUser::factory()->create([
            'id_Usuario' => '1',
            'estado' => 'Admin-estado',
            'cidade' => 'Admin-cidade',
            'bairro' => 'Admin-bairro',
            'rua' => 'Admin-rua',
            'complemento' => 'Admin-complemento',
            'numero' => '1010',
            'cep' => '99999-999',
        ]);
    }
}
