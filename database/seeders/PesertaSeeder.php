<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peserta::insert([
            [
                'nama' => 'alpha',
                'email' => 'alpha@gmail.com',
                'nilai_X' => 10,
                'nilai_Y' => 10,
                'nilai_Z' => 10,
                'nilai_W' => 10,
                'created_by_id' => 1
            ],
            [
                'nama' => 'beta',
                'email' => 'beta@gmail.com',
                'nilai_X' => 10,
                'nilai_Y' => 10,
                'nilai_Z' => 10,
                'nilai_W' => 10,
                'created_by_id' => 1
            ],
            [
                'nama' => 'charlie',
                'email' => 'charlie@gmail.com',
                'nilai_X' => 10,
                'nilai_Y' => 10,
                'nilai_Z' => 10,
                'nilai_W' => 10,
                'created_by_id' => 1
            ],
            [
                'nama' => 'delta',
                'email' => 'delta@gmail.com',
                'nilai_X' => 10,
                'nilai_Y' => 10,
                'nilai_Z' => 10,
                'nilai_W' => 10,
                'created_by_id' => 1
            ],
            [
                'nama' => 'echo',
                'email' => 'echo@gmail.com',
                'nilai_X' => 10,
                'nilai_Y' => 10,
                'nilai_Z' => 10,
                'nilai_W' => 10,
                'created_by_id' => 1
            ]
        ]);
    }
}
