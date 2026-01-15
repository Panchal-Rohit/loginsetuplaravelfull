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
            ],

            'Orders' => [
                'orders.view',
                'orders.create',
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

