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
            'code' => '80250104',
            'street' => 'Rua Pasteur',
            'number' => 463,
            'uf' => 'PR',
            'city' => 'Paraná',
            'district' => 'Batel',
            'state' => 'Curitiba',
        ]);
    }
}
