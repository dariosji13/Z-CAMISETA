<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permisos = [
            'ver productos',
            'crear productos',
            'editar productos',
            'eliminar productos',
            'ver usuarios',
            'editar usuarios',
        ];

        $permisosFilament = [
            'view_any_user',
            'view_user',
            'create_user',
            'update_user',
            'delete_user',
        ];

        $permisosFilamentProductos = [
            'view_any_product',
            'view_product',
            'create_product',
            'update_product',
            'delete_product',
        ];


        $permisosCliente = [
            'view_any_product',
            'view_product',
        ];

        $clienteRole = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'cliente', 'guard_name' => 'web']);
        foreach ($permisosCliente as $permiso) {
            $permisoObj = \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permiso, 'guard_name' => 'web']);
            $clienteRole->givePermissionTo($permisoObj);
        }

        $todosLosPermisos = array_merge($permisos, $permisosFilament, $permisosFilamentProductos);

        foreach ($todosLosPermisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso, 'guard_name' => 'web']);
        }

        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions(Permission::all());
        $cliente = Role::firstOrCreate(['name' => 'cliente', 'guard_name' => 'web']);
        $cliente->syncPermissions(['view_product']);

        $user = User::where('email', 'admin@example.com')->first();
        if ($user) {
            $user->assignRole($admin);
        }

        $clienteUser = User::firstOrCreate(
            ['email' => 'cliente@example.com'],
            [
                'name' => 'Cliente',
                'password' => bcrypt('password'),
            ]
        );
        $clienteUser->assignRole($cliente);
    }
}
