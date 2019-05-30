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
            'name'           => 'Dominion Olorunfemi',
            'email'          => 'dlorunfemi@gmail.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 3,
            'name'           => 'The CEO',
            'email'          => 'remiolofa@remiolo.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 4,
            'name'           => 'Adeyemo M. Bolanle',
            'email'          => 'adeyemo@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 5,
            'name'           => 'Bayo Arashi',
            'email'          => 'bayo@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 6,
            'name'           => 'Dotun Adeleke',
            'email'          => 'dotun@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 7,
            'name'           => 'Joseph Success',
            'email'          => 'joseph@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 8,
            'name'           => 'Olaoye Muyideen',
            'email'          => 'olaoye@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
            'id'             => 9,
            'name'           => 'Olayemi Olawole',
            'email'          => 'olayemi@remiolofa.com',
            'password'       => '$2y$10$GQPzrvu4qRyGIn7lt0wmAu.WkKj8fJLeSxsO47dq.xEi6eJjANoLK',
            'remember_token' => null,
            'created_at'     => '2019-05-14 00:46:01',
            'updated_at'     => '2019-05-14 00:46:01',
            'deleted_at'     => null,
        ],
        [
          'id'             => 10,
          'name'           => 'Adeniran Adebisi',
          'email'          => 'adeniran@remiolofa.com',
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
