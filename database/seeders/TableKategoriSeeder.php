<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;

class TableKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Makanan',
                'deskripsi' => 'Makanan'
            ],
            [
                'nama' => 'Minuman',
                'deskripsi' => 'Minuman'
            ],
            [
                'nama' => 'Buah',
                'deskripsi' => 'Buah'
            ]
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
