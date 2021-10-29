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
            'name' => 'tech',
            'email' => 'techboostkarte@localhost',
            'password' => Hash::make('tech'),
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
