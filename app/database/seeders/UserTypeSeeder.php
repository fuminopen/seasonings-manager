<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::create([
            'id' => 1,
            'name' => '管理者',
        ]);
        UserType::create([
            'id' => 2,
            'name' => 'メンバー',
        ]);
    }
}
