<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '17',
                'title'      => 'property_management_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '18',
                'title'      => 'property_category_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '19',
                'title'      => 'property_category_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '20',
                'title'      => 'property_category_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '21',
                'title'      => 'property_category_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '22',
                'title'      => 'property_category_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '23',
                'title'      => 'property_tag_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '24',
                'title'      => 'property_tag_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '25',
                'title'      => 'property_tag_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '26',
                'title'      => 'property_tag_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '27',
                'title'      => 'property_tag_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '28',
                'title'      => 'property_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '29',
                'title'      => 'property_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '30',
                'title'      => 'property_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '31',
                'title'      => 'property_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '32',
                'title'      => 'property_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '33',
                'title'      => 'expense_management_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '34',
                'title'      => 'expense_category_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '35',
                'title'      => 'expense_category_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '36',
                'title'      => 'expense_category_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '37',
                'title'      => 'expense_category_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '38',
                'title'      => 'expense_category_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '39',
                'title'      => 'income_category_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '40',
                'title'      => 'income_category_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '41',
                'title'      => 'income_category_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '42',
                'title'      => 'income_category_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '43',
                'title'      => 'income_category_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '44',
                'title'      => 'expense_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '45',
                'title'      => 'expense_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '46',
                'title'      => 'expense_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '47',
                'title'      => 'expense_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '48',
                'title'      => 'expense_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '49',
                'title'      => 'income_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '50',
                'title'      => 'income_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '51',
                'title'      => 'income_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '52',
                'title'      => 'income_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '53',
                'title'      => 'income_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '54',
                'title'      => 'expense_report_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '55',
                'title'      => 'expense_report_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '56',
                'title'      => 'expense_report_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '57',
                'title'      => 'expense_report_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '58',
                'title'      => 'expense_report_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '59',
                'title'      => 'landlord_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '60',
                'title'      => 'landlord_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '61',
                'title'      => 'landlord_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '62',
                'title'      => 'landlord_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '63',
                'title'      => 'landlord_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '64',
                'title'      => 'tenant_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '65',
                'title'      => 'tenant_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '66',
                'title'      => 'tenant_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '67',
                'title'      => 'tenant_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '68',
                'title'      => 'tenant_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '69',
                'title'      => 'payment_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '70',
                'title'      => 'payment_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '71',
                'title'      => 'payment_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '72',
                'title'      => 'payment_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '73',
                'title'      => 'payment_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '74',
                'title'      => 'vacancy_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '75',
                'title'      => 'vacancy_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '76',
                'title'      => 'vacancy_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '77',
                'title'      => 'vacancy_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '78',
                'title'      => 'vacancy_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '79',
                'title'      => 'requistion_create',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '80',
                'title'      => 'requistion_edit',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '81',
                'title'      => 'requistion_show',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '82',
                'title'      => 'requistion_delete',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '83',
                'title'      => 'requistion_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '84',
                'title'      => 'report_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '85',
                'title'      => 'email_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '86',
                'title'      => 'message_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '87',
                'title'      => 'payment_confirm',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '88',
                'title'      => 'receipt_access',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '89',
                'title'      => 'receipt_print',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ],
            [
                'id'         => '90',
                'title'      => 'receipt_download',
                'created_at' => '2019-05-14 10:45:21',
                'updated_at' => '2019-05-14 10:45:21',
            ]
        ];

        Permission::insert($permissions);
    }
}
