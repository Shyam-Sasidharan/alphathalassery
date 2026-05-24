<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'vineeth@soarmorrow.com',
            'phone' => '9995362824',
            'password' => bcrypt('123456')
        ]);
    }
}
