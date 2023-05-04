<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ma = [
            ['ma' => 'T1'],
            ['ma' => 'T2'],
            ['ma' => 'T3'],
            ['ma' => 'T4'],
            ['ma' => 'T5'],
            ['ma' => 'T6'],
        ];

        foreach ($ma as $item) {
            DB::table('ma')->insert([
                'ma' => $item['ma'],
            ]);
        }
    }
}
