<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_root = Role::updateOrCreate(
            [
                'name' => 'root',
            ],
            ['name' => 'root']
        );

        $role_admin = Role::updateOrCreate(
            [
                'name' => 'admin',
            ],
            ['name' => 'admin']
        );

        $role_employee = Role::updateOrCreate(
            [
                'name' => 'employee',
            ],
            ['name' => 'employee']
        );

        $role_guest = Role::updateOrCreate(
            [
                'name' => 'guest',
            ],
            ['name' => 'guest']
        );
    }
}
