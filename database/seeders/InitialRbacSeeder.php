<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialRbacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1) Inserir hierarchical_roles
        $roles = [
            ['name' => 'Diretor', 'level' => 100],
            ['name' => 'Gestor', 'level' => 70],
            ['name' => 'Supervisor', 'level' => 40],
            ['name' => 'Colaborador', 'level' => 10],
        ];
        $roleIds = [];
        foreach ($roles as $role) {
            $roleIds[$role['name']] = \App\Models\HierarchicalRole::create($role)->id;
        }

        // 2) Criar usuário admin
        $adminPassword = 'SenhaForte@123';
        $admin = \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@empresa.local',
            'hierarchical_role_id' => $roleIds['Diretor'],
            'company_id' => 1,
            'is_super_admin' => true,
            'active' => true,
            'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
            'password_encrypted' => \Illuminate\Support\Facades\Crypt::encryptString($adminPassword),
        ]);

        // 3) Criar permissões iniciais
        $permissions = [
            'users.create',
            'users.edit',
            'users.disable',
            'users.assign_profile',
            'users.change_sector',
            'users.manage_permissions',
        ];
        $permissionIds = [];
        foreach ($permissions as $perm) {
            $permissionIds[$perm] = \App\Models\SystemPermission::create([
                'key' => $perm,
            ])->id;
        }

        // 4) Vincular todas permissões ao role Diretor
        foreach ($permissionIds as $permId) {
            \App\Models\RolePermission::create([
                'hierarchical_role_id' => $roleIds['Diretor'],
                'system_permission_id' => $permId,
            ]);
        }
    }
}
