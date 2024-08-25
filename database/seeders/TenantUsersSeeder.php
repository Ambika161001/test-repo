<?php

namespace Database\Seeders;

use App\Models\User;
use Stancl\Tenancy\Facades\Tenancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['tenant_id' => 1, 'name' => 'ten1 user1','email' => 'user1@tent1.com'],
            ['tenant_id' => 1, 'name' => 'ten1 user2','email' => 'user2@tent1.com'],
            ['tenant_id' => 2, 'name' => 'ten2 user1','email' => 'user1@tent2.com'],
            ['tenant_id' => 2, 'name' => 'ten2 user2','email' => 'user2@tent2.com'],
        ];

        foreach ($users as $user) {
            $user = User::create([
                'tenant_id' => $user['tenant_id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => bcrypt('password'),
            ]);
        }
    }
}
