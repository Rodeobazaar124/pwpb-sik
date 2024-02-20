<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muhammad Azfa',
            'email' => 'azfasa15@gmail.com',
            'password' => Hash::make('rahasia'),
        ]);
        $barangs = [
            ['Drone', 'DJI', 17999000, 'drone.jpg'],
            ['Macbook Air', 'Apple', 19999000, 'laptop.jpg'],
            ['Mixed Reality Headsets', 'XR', 34000000, 'mixedreality.jpg'],
            ['Camera Canon EOS 1200D', 'Canon', 1570000, 'camera.jpg'],
            ['STAX SR-009S Headphones', 'STAX', 1570000, 'headphones.jpg'],
            ['Bitcoin BTC', 'Cryptocurrency', 782437358, 'bitcoin.jpg'],
            ['Redmi Note 11 4/128', 'Xiaomi', 2100000, 'headphones.jpg'],
        ];
        foreach ($barangs as $barang) {
            Barang::create([
                'nama_produk' => $barang[0],
                'merk' => $barang[1],
                'harga' => $barang[2],
                'image' => $barang[3],
            ]);
        }
        Transaksi::create([
            'id_barang' => 1,
            'user_id' => 1,
            'total_item' => 10,
            'status_pembayaran' => 'selesai',
            'total_harga' => 2100000 * 10
        ]);
    }
}
