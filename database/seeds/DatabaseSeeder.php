<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        cache()->flush();
        $this->call(UsersTableSeeder::class);
    }
}
