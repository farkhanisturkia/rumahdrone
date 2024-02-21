<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Stok;
use App\Models\User;
use App\Models\Delivery;
use App\Models\Inventaris;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'role'      => 'admin',
            'password'  => Hash::make('password')
        ]);

        User::create([
            'name'      => 'Staf',
            'email'     => 'staf@gmail.com',
            'role'      => 'staf',
            'password'  => Hash::make('password')
        ]);

        Inventaris::create([
            'name'      => 'baling-baling'
        ]);

        Stok::create([
            'inventaris_id' => 1,
            'total'         => 10,
            'in'            => 15,
            'out'           => 5,
            'min'           => 7
        ]);

        Delivery::create([
            'order_number'  => 1,
            'date'          => '2024-01-25',
            'inventaris_id' => 1,
            'order_total'   => 3,
            'address'       => 'surabaya',
            'status'        => 'accepted'
        ]);
    }
}
