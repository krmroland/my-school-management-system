<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        return User::Create([
            'name' => 'Ahimbisibwe Roland',
            'email' => 'roland@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
