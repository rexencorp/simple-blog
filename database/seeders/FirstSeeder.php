<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Halaman;
use App\Models\Komentar;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=> 'administrator',
        ]);
        Role::create([
            'name'=> 'author',
        ]);
        Role::create([
            'name'=> 'contributor',
        ]);
        Role::create([
            'name'=> 'reader',
        ]);

        User::create([
            'name'=> 'Henry',
            'email'=> 'henry@gmail.com',
            'password'=>Hash::make('henry123'),
            'role_id'=>'1'
        ]);

        User::create([
            'name'=> 'Udin',
            'email'=> 'udin@gmail.com',
            'password'=>Hash::make('udin123'),
            'role_id'=>'2'
        ]);

        User::create([
            'name'=> 'Wahyu',
            'email'=> 'wahyu@gmail.com',
            'password'=>Hash::make('wahyu123'),
            'role_id'=>'3'
        ]);

        User::create([
            'name'=> 'Alul',
            'email'=> 'alul@gmail.com',
            'password'=>Hash::make('alul123'),
            'role_id'=>'4'
        ]);

        Artikel::create([
            'judul' => 'Judul 1',
            'content' => 'Joget Alul',
            'user_id' => 1,
            'status' => 3,
        ]);

        Artikel::create([
            'judul' => 'Judul 2',
            'content' => 'Ternak Uler',
            'user_id' => 2,
            'status' => 2,
        ]);

        Artikel::create([
            'judul' => 'Judul 3',
            'content' => 'Bertani',
            'user_id' => 3,
            'status' => 1,
        ]);

        Halaman::create([
            'name' => 'About Me',
            'content'=> 'Tentang Saya'
        ]);


        Halaman::create([
            'name' => 'Artikel',
            'content'=> 'Kumpulan Artikel'
        ]);


        Halaman::create([
            'name' => 'Writer',
            'content'=> 'Para Penulis'
        ]);


        Komentar::create([
            'user_id' => 2,
            'status' => 3,
            'artikel_id'=>1,
            'comment'=> 'Halo Saya Ikut'
        ]);


        Komentar::create([
            'user_id' => 4,
            'status' => 2,
            'artikel_id'=>1,
            'comment'=> 'Boleh Ikut',
            'comment_id'=> 1
        ]);

        Komentar::create([
            'user_id' => 3,
            'status' => 3,
            'artikel_id'=>1,
            'comment'=> 'Saya Juga',
            'comment_id'=> 1
        ]);
    }
}
