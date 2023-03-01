<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '123456789',
            'name' => 'admin',
            'foto' => 'SMKIUTAMA.jpg',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);
    }
}
