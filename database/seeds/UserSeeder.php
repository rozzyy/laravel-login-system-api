<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Rozzy Rahmanda',
            'email' => 'rozzyrahmanda0@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
