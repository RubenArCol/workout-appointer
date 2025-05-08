<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AssignPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Obtén el usuario (ID = 1)
        $user = User::find(1);
        if (!$user) {
            $this->command->error('Usuario con ID 1 no encontrado');
            return;
        }

        // Asigna permisos específicos
        $adminPermission = Permission::where('name', 'admin')->first();
        $viewPermission = Permission::where('name', 'ver ejercicios')->first();

        if ($adminPermission) {
            $user->givePermissionTo($adminPermission);
        }

        if ($viewPermission) {
            $user->givePermissionTo($viewPermission);
        }

        $this->command->info('Permisos asignados al usuario con ID 1');
    }
}
