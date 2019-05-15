<?php

use App\ProductTag;
use Illuminate\Database\Seeder;

class ProductTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
              'id'         => 1,
              'name'      => 'Right wing',
              'created_at' => '2019-05-14 10:45:21',
              'updated_at' => '2019-05-14 10:45:21',
              'deleted_at'    => null,
            ],
            [
                'id'         => 2,
                'name'      => 'Left wing',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 3,
                'name'      => 'Flat Up',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 4,
                'name'      => 'Flat Down',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 5,
                'name'      => 'Ground Floor',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 6,
                'name'      => 'First Floor',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 7,
                'name'      => 'Second Floor',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 8,
                'name'      => 'Basement',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 9,
                'name'      => 'A1',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 10,
                'name'      => 'A2',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 11,
                'name'      => 'A3',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 12,
                'name'      => 'A4',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 13,
                'name'      => 'A5',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 14,
                'name'      => 'A6',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 15,
                'name'      => 'B1',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 16,
                'name'      => 'B2',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 17,
                'name'      => 'B3',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 18,
                'name'      => 'B4',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 19,
                'name'      => 'B5',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 20,
                'name'      => 'B6',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 21,
                'name'      => 'Warehouse',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 22,
                'name'      => 'Factory',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 23,
                'name'      => 'Office',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 24,
                'name'      => 'Hospitality/Hall',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 25,
                'name'      => 'Cedar Resort',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 26,
                'name'      => 'First floor by the right',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 27,
                'name'      => 'WAREHOUSE AT OYSSIC',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 28,
                'name'      => 'WAREHOUSE OF 560 SQM AT OYSSIC',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ],
            [
                'id'         => 29,
                'name'      => 'Room and Parlor',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
                'deleted_at'    => null,
            ]];

        ProductTag::insert($tags);
    }
    }
