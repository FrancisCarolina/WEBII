<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    public function run(): void {
        
        $data = [
            // COORDENADOR
            ["role_id" => 1, "resource_id" => 1, "permission" => true],
            ["role_id" => 1, "resource_id" => 2, "permission" => true],
            ["role_id" => 1, "resource_id" => 3, "permission" => true],
            ["role_id" => 1, "resource_id" => 4, "permission" => true],
            ["role_id" => 1, "resource_id" => 5, "permission" => true],
            ["role_id" => 1, "resource_id" => 6, "permission" => true],
            ["role_id" => 1, "resource_id" => 7, "permission" => true],
            ["role_id" => 1, "resource_id" => 8, "permission" => true],
            ["role_id" => 1, "resource_id" => 9, "permission" => true],
            ["role_id" => 1, "resource_id" => 10, "permission" => true],
            ["role_id" => 1, "resource_id" => 11, "permission" => true],
            ["role_id" => 1, "resource_id" => 12, "permission" => true],
            ["role_id" => 1, "resource_id" => 13, "permission" => true],
            ["role_id" => 1, "resource_id" => 14, "permission" => true],
            ["role_id" => 1, "resource_id" => 15, "permission" => true],

            // ALUNO
            ["role_id" => 2, "resource_id" => 1, "permission" => true],
            ["role_id" => 2, "resource_id" => 2, "permission" => false],
            ["role_id" => 2, "resource_id" => 3, "permission" => false],
            ["role_id" => 2, "resource_id" => 4, "permission" => true],
            ["role_id" => 2, "resource_id" => 5, "permission" => false],
            ["role_id" => 2, "resource_id" => 6, "permission" => true],
            ["role_id" => 2, "resource_id" => 7, "permission" => false],
            ["role_id" => 2, "resource_id" => 8, "permission" => false],
            ["role_id" => 2, "resource_id" => 9, "permission" => true],
            ["role_id" => 2, "resource_id" => 10, "permission" => false],
            ["role_id" => 2, "resource_id" => 11, "permission" => true],
            ["role_id" => 2, "resource_id" => 12, "permission" => false],
            ["role_id" => 2, "resource_id" => 13, "permission" => false],
            ["role_id" => 2, "resource_id" => 14, "permission" => true],
            ["role_id" => 2, "resource_id" => 15, "permission" => false],
        ];
        DB::table('permissions')->insert($data);
    }
}