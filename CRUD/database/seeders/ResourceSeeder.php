<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    public function run(): void {
        
        $data = [
            ["name" => "eixo.index"],                    // 1
            ["name" => "eixo.create"],      // 2
            ["name" => "eixo.edit"],             // 3
            ["name" => "eixo.show"],              // 4
            ["name" => "eixo.destroy"],             // 5
            ["name" => "nivel.index"],                    // 6
            ["name" => "nivel.create"],      // 7
            ["name" => "nivel.edit"],             // 8
            ["name" => "nivel.show"],              // 9
            ["name" => "nivel.destroy"],             // 10
            ["name" => "curso.index"],                    // 11
            ["name" => "curso.create"],      // 12
            ["name" => "curso.edit"],             // 13
            ["name" => "curso.show"],              // 14
            ["name" => "curso.destroy"],             // 15
        ];
        DB::table('resources')->insert($data);
    }
}