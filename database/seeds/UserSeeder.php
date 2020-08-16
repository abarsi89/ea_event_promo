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
        User::truncate();

        User::create([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('john'),
        ]);

        User::create([
            'id' => 2,
            'name' => 'Jane Doe',
            'email' => 'jane@doe.com',
            'password' => Hash::make('jane'),
        ]);
    }
}
