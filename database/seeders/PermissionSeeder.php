<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [

            'Dashboard' => [
                'dashboard.view',
            ],

            'Users' => [
                'users.view',
                'users.create',
                'users.edit',
                'users.delete',
            ],

            'Roles' => [
                'roles.view',
                'roles.manage',
                'roles.delete',
            ],

            'Categories' => [
                'category.view',
                'category.manage',
            ],
            'Permissions' => [
                'permissions.view',
                'permissions.manage',
            ],
        ];

        foreach ($permissions as $group => $items) {
            foreach ($items as $perm) {
                Permission::firstOrCreate([
                    'name'  => $perm,
                    'group' => $group,
                ]);
            }
        }
    }
}
