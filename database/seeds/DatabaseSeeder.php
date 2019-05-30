<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            LandlordsTableSeeder::class,
            PropertyCategoriesTableSeeder::class,
            PropertyTagsTableSeeder::class,
            PropertiesTableSeeder::class,
            VacancyTableSeeder::class,
            TenantsTableSeeder::class,
        ]);
    }
}
