<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'cep' => '80250104',
            'endereco' => 'Rua Pasteur',
            'number' => '463',
            'complemento' => 'apt',
            'bairro' => 'Batel',
            'cidade' => 'Paraná',
            'uf' => 'PR',
            'ddd' => '41',
        ]);
    }
}
