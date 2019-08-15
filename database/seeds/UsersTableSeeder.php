<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = [
          [
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 2,
            'name'           => 'Remi Olofa',
            'email'          => 'remi.olofa@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 3,
            'name'           => 'Adeyemo M. Bolanle',
            'email'          => 'omobolanle.adeyemo@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 4,
            'name'           => 'Adeniran Adebisi',
            'email'          => 'isaac.adeniran@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 5,
            'name'           => 'Dotun Adeleke',
            'email'          => 'dotun.adeleke@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 6,
            'name'           => 'Adeoye Opeyemi',
            'email'          => 'adeoye.opeyemi@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 7,
            'name'           => 'Adebayo Arashi',
            'email'          => 'adebayo.arashi@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 8,
            'name'           => 'Joseph Success',
            'email'          => 'joseph.success@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
      ];

        User::insert($user);
        // foreach ($users as $user) {
        //   // code...
        // }

    }
}
