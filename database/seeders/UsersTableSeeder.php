<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Paolo',
                'email' => 'paolo.falcoapp@mail.com',
                'password' => Hash::make('paolo1996'),
            ],
        ];

        foreach ($users as $user_data) {
            User::create($user_data);
        }
    }
}
