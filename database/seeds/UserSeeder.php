<?php

use App\User;
use Illuminate\Database\Seeder;
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
            'name' => 'shopper',
            'email' => 'shopper@opensales.com',
            'password' => Hash::make('secret'),
        ]);
    }
}
