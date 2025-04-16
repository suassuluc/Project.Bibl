<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados = [
            ['estante' => 'A1', 'prateleira' => 'P1', 'status' => true],
            ['estante' => 'A1', 'prateleira' => 'P2', 'status' => true],
            ['estante' => 'B2', 'prateleira' => 'P1', 'status' => false],
            ['estante' => 'C3', 'prateleira' => 'P3', 'status' => true],
        ];

        foreach ($dados as $dado) {
            DB::table('localizacao')->updateOrInsert(
                ['estante' => $dado['estante'], 'prateleira' => $dado['prateleira']], // Condição para evitar duplicatas
                $dado
            );
        }
    }
}
