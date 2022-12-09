<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSeed = [
            [
                'nama' => 'Budi',
                'saldo' => 1000000,
                'norek' => '1234567890'
            ],
            [
                'nama' => 'Andi',
                'saldo' => 2000000,
                'norek' => '0987654321'
            ],
            [
                'nama' => 'Caca',
                'saldo' => 3000000,
                'norek' => '1234567891'
            ],
            [
                'nama' => 'Dedi',
                'saldo' => 4000000,
                'norek' => '0987654322'
            ],
            [
                'nama' => 'Euis',
                'saldo' => 5000000,
                'norek' => '1234567892'
            ],
            [
                'nama' => 'Fafa',
                'saldo' => 6000000,
                'norek' => '0987654323'
            ],
            [
                'nama' => 'Gigi',
                'saldo' => 7000000,
                'norek' => '1234567893'
            ],
            [
                'nama' => 'Hani',
                'saldo' => 8000000,
                'norek' => '0987654324'
            ],
            [
                'nama' => 'Icha',
                'saldo' => 9000000,
                'norek' => '1234567894'
            ]
        ];
        
        foreach ($dataSeed as $data) {
            Account::create($data);
        }
    }
}
