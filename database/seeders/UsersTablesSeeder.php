<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //
        $users = [
            [
                'name' => 'Jon Doe',
                'email' => 'sample@gmail.com',
                'password' => '123456'
            ],
            [                       
                'name' => 'Loren Ipsum',
                'email' => 'sample2@gmail.com',
                'password' => '123456'
            ],

        ];

        foreach ($users as $key => $value) {
            DB::table('users')->insert([
                $key => $value
            ]); 
        }
    }
}
