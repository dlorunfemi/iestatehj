<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
