<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $user = [
    [
        'id' => (string) Str::uuid(),
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin'),
        'role' => 'admin'
    ],
    [
        'id' => (string) Str::uuid(),
        'name' => 'user',
        'email' => 'user@gmail.com',
        'password' => Hash::make('user123'),
        'role' => 'user'
    ]
    ];

    foreach ($user as $key => $value) {
    User::create($value);
    }
    }
}
