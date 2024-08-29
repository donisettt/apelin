<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('outlets')->insert([
            [
                'nama' => 'Laundry Sagita',
                'alamat' => 'Padaherang',
                'tlp' => '085757501928'
            ],
            [
                'nama' => 'Dedeh 1',
                'alamat' => 'Kalipucang',
                'tlp' => '085217208593'
            ],
        ]);

        DB::table('users')->insert([
            [
                'nama' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
                'outlet_id' => 1,
            ],
            [
                'nama' => 'Kasir',
                'username' => 'kasir',
                'password' => bcrypt('1234'),
                'role' => 'kasir',
                'outlet_id' => 1,
            ],
            [
                'nama' => 'Pemilik',
                'username' => 'owner',
                'password' => bcrypt('1234'),
                'role' => 'owner',
                'outlet_id' => 1,
            ]
        ]);

        DB::table('pakets')->insert([
            [
                'nama_paket' => 'Regular',
                'harga' => 7000,
                'jenis' => 'kiloan',
                'outlet_id' => 1,
            ],
            [
                'nama_paket' => 'Bed Cover',
                'harga' => 5000,
                'jenis' => 'bed_cover',
                'outlet_id' => 1,
            ],
        ]);

        DB::table('members')->insert([
            [
                'nama' => 'Sagita',
                'jenis_kelamin' => 'L',
                'alamat' => 'Padaherang',
                'tlp' => '085757501928'
            ],
            [
                'nama' => 'Dedeh',
                'jenis_kelamin' => 'P',
                'alamat' => 'Kalipucang',
                'tlp' => '085217208593'
            ],
            [
                'nama' => 'Tia',
                'jenis_kelamin' => 'P',
                'alamat' => 'Ciamis',
                'tlp' => '085712563456'
            ]
        ]);
    }
}
