<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'admin',
        ]);
        DB::table('users')->insert([
            'nama' => 'ujang',
            'email' => 'ujang@gmail.com',
            'password' => bcrypt('123'),
            'auth' => 'customer',
        ]);
        DB::table('category')->insert([
            'nama' => 'pakaian',
            'harga' => '7000',
            'icon' => 'ionicon-shirt-outline'
        ]);
        DB::table('category')->insert([
            'nama' => 'seprai',
            'harga' => '35000',
            'icon' => 'ionicon-bed-outline'
        ]);
        DB::table('category')->insert([
            'nama' => 'sepatu',
            'harga' => '35000',
            'icon' => 'hugeicons-running-shoes'
        ]);
    }
}
