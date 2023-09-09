<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user1 = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@araya.com',
        ]);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $user1->assignRole($roleAdmin);

        $user2 = User::factory()->create([
            'name' => 'Staff',
            'email' => 'staff@araya.com',
        ]);
        $roleStaff = Role::create(['name' => 'Staff']);
        $user2->assignRole($roleStaff);

        Role::create(['name' => 'Member']);
    }
}
