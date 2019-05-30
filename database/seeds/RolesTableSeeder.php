<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
              [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 3,
                'title'      => 'Ceo',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 4,
                'title'      => 'Gm',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 5,
                'title'      => 'Accountant',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ],
            [
                'id'         => 6,
                'title'      => 'Officer',
                'created_at' => '2019-05-14 00:46:00',
                'updated_at' => '2019-05-14 00:46:00',
                'deleted_at' => null,
            ]];

        Role::insert($roles);
    }
}
