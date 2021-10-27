<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\user_status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        user_status::create([
            'status' => 'admin'
        ]);

        user_status::create([
            'status' => 'guest'
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'hunx.13@gmail.com',
            'password' => bcrypt('password'),
            'user_status_id' => '1'
        ]);
    }
}
