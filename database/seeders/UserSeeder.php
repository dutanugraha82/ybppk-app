<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'email' => 'superadmin@test.com',
                'password' => Hash::make('test'),
                'role' => 'superadmin',
            ],
            [
                'email' => 'opt.yayasan@test.com',
                'password' => Hash::make('test'),
                'role' => 'opt_yayasan',
            ],
            [
                'email' => 'opt.rektorat@test.com',
                'password' => Hash::make('test'),
                'role' => 'opt_rektorat',
            ],
            [
                'email' => 'bendahara@test.com',
                'password' => Hash::make('test'),
                'role' => 'bendahara',
            ],
            [
                'email' => 'top.mgmt.rektorat@test.com',
                'password' => Hash::make('test'),
                'role' => 'top_mgmt_rektorat',
            ],
            [
                'email' => 'top.mgmt.yayasan@test.com',
                'password' => Hash::make('test'),
                'role' => 'top_mgmt_yayasan',
            ]
        ];

        foreach ($users as $item) {
            DB::table('users')->insert([
                'email' => $item['email'],
                'password' => $item['password'],
                'role' => $item['role'],
            ]);
        }
    }
}
