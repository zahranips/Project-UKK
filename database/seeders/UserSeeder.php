<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'nama' => 'zahrani',
            'alamat' => 'ciawi',
            'telpon' => '085773386692',
            'status' => 'aktif',
            'username' => 'zahrani',
            'password' => bcrypt('1234'),
            'akses' => 'admin',
        ]);

        User::insert([
            'nama' => 'putri',
            'alamat' => 'Cilengsi',
            'telpon' => '089654321789',
            'status' => 'aktif',
            'username' => 'putri',
            'password' => bcrypt('1234'),
            'akses' => 'manager',
        ]);

        User::insert([
            'nama' => 'solehah',
            'alamat' => 'cicurug',
            'telpon' => '087654321',
            'status' => 'aktif',
            'username' => 'solehah',
            'password' => bcrypt('1234'),
            'akses' => 'kasir',
        ]);

    }
}
