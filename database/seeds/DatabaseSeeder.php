<?php

use Illuminate\Database\Seeder;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'test',
            'email' => 'test',
            'password' => Hash::make('test'),
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
