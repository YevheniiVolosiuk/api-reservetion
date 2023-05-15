<?php

namespace Database\Seeders;

use App\Enums\Role as EnumRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $allRoles = Role::all()->keyBy('id');

        $permissions = [
            'properties-manage' => [EnumRole::ROLE_OWNER],
            'bookings-manage' => [EnumRole::ROLE_USER],
        ];

        foreach ($permissions as $key => $roles) {
            $permission = Permission::create(['name' => $key]);
            foreach ($roles as $role) {
                $allRoles[$role]->givePermissionTo($permission);
            }
        }
    }
}
