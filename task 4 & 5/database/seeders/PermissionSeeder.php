<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //users-view  | uses-create 
        $modules = ['users', 'tests', 'trianers', 'writer', 'blogs'];
        $actions = ['view', 'create', 'read', 'update', 'delete'];
        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissionName = $module . "-" . $action;

                Permission::updateOrCreate([
                    'name' => $permissionName
                ], [
                    'name' => $permissionName,
                    'guard_name' => "web"
                ]);
            }
        }
    }
}
