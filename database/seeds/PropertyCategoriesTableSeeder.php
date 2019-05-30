<?php

use App\PropertyCategory;
use Illuminate\Database\Seeder;

class PropertyCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       $categories = [[
           'id'            => 1,
           'name'          => 'BLOCK OF FOUR FLATS',
           'description'   => '',
           'created_at'    => '2019-05-14 00:46:00',
           'updated_at'    => '2019-05-14 00:46:00',
           'deleted_at'    => null,
       ],
           [
             'id'            => 2,
             'name'          => 'BLOCK OF SIX FLATS',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 3,
             'name'          => 'TWIN BUNGALOW',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 4,
             'name'          => 'BLOCK OF TWELVE FLATS',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 5,
             'name'          => 'DETACHED HOUSE',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 6,
             'name'          => 'DUPLEX',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 7,
             'name'          => 'TENEMENT PROPERTY',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 8,
             'name'          => 'MULTITALENTED PROPERTY',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 9 ,
             'name'          => 'SHOPPING COMPLEX',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 10,
             'name'          => 'SHOP',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 11,
             'name'          => 'OFFICE',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ],
           [
             'id'            => 12,
             'name'          => 'Two Flats',
             'description'   => '',
             'created_at'    => '2019-05-14 00:46:00',
             'updated_at'    => '2019-05-14 00:46:00',
             'deleted_at'    => null,
           ]];

           PropertyCategory::insert($categories);
     }
   }
