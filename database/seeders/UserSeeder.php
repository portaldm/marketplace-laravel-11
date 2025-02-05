<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insere um registro por padrao
        DB::table('users')->insert([
            [
                'name' => 'Max Junior',
                'username' => 'administrador',
                'email' => 'contato@dicasdomax.com.br',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Vendedor vendor',
                'username' => 'vendor',
                'email' => 'vendedor@dicasdomax.com.br',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Cliente user',
                'username' => 'user',
                'email' => 'cliente@dicasdomax.com.br',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('password')
            ]

        ]);
    }

}
