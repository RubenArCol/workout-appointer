<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Creación inicial de permisos
     */

    public function run(): void
    {
        // Crear roles solo si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'usuario']);

        // Crear permisos solo si no existen
        $permAdmin = Permission::firstOrCreate(['name' => 'admin']);
        $permVerEjercicios = Permission::firstOrCreate(['name' => 'ver ejercicios']);

        // Asignar permisos a los roles
        $adminRole->syncPermissions([$permAdmin, $permVerEjercicios]);
        $userRole->syncPermissions([$permVerEjercicios]);
    }
}
