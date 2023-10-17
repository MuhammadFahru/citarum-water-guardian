<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::insert(array(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make("admin#123"),
                'salt' => 'admin#123',
                'is_active' => true,
                'role_id' => 1,
                'email' => 'admin@gmail.com'
            ]
        ));
    }
}
