<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'tawfeeq@gmail.com'],
            [
                'name' => 'Admin',  // اسم الآدمن
                'password' => Hash::make('ASDq504we%$^2*-/13XZC'),  // كلمة المرور
                'is_admin' => true,  // تعيين المستخدم كـ "آدمن"
            ]
        );
    }
}
