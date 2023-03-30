<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class TableProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Bolu Peca',
                'deskripsi' => 'Kue Bolu disiram gulmer',
                'harga' => 10_000,
                'stok' => 20
            ],
            [
                'nama' => 'Sari Pengantin',
                'deskripsi' => 'Temannya Amparan tatak',
                'harga' => 15_000,
                'stok' => 50
            ]
        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}
