<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
        [
        'id' => (string) Str::uuid(),
        'kategori_buku' => 'Novel',
         ],
        [
        'id' => (string) Str::uuid(),
        'kategori_buku' => 'Komik',
        ],
        [
        'id' => (string) Str::uuid(),
        'kategori_buku' => 'Ensiklopedia',
        ],
        [
        'id' => (string) Str::uuid(),
        'kategori_buku' => 'Sejarah',
        ],
        [
        'id' => (string) Str::uuid(),
        'kategori_buku' => 'Biografi',
        ],
    ];
        foreach ($kategori as $key => $value) {
        Kategori::create($value);
        }
    }
}
