<?php
// lhi
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $ceo_permissions = Permission::all();
        Role::findOrFail(2)->permissions()->sync($ceo_permissions->pluck('id'));

        $gm_permissions = $ceo_permissions->filter(
            function ($permission) {
                return substr($permission->title, 0, 5) != 'role_' &&
                    substr($permission->title, 0, 11) != 'permission_';
            }
        );
        Role::findOrFail(3)->permissions()->sync($gm_permissions);

        $accountant_permissions = $gm_permissions->filter(
            function ($permission) {
                return substr($permission->title, 0, 5) != 'user_' &&
                    substr($permission->title, 0, 5) != 'role_' &&
                    substr($permission->title, 0, 11) != 'permission_';
            }
        );
        Role::findOrFail(4)->permissions()->sync($accountant_permissions);

        $officer_permissions = $gm_permissions->filter(
            function ($permission) {
                return substr($permission->title, 0, 5) != 'user_' &&
                    substr($permission->title, 0, 5) != 'role_' &&
                    substr($permission->title, 0, 11) != 'permission_' &&
                    substr($permission->title, 0, 8) != 'expense_' &&
                    substr($permission->title, 0, 7) != 'income_' &&
                    substr($permission->title, 0, -7) != 'landlord_';
            }
        );
        Role::findOrFail(5)->permissions()->sync($officer_permissions);
    }
}
