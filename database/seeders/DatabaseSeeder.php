<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PilihanColor;
use App\Models\PilihanType;
use App\Models\User;
use App\Models\WebSetting;
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
            'name' => 'Wahyu',
            'email' => 'wahyu@gmail.com',
        ]);
        $roleMember = Role::create(['name' => 'Member']);
        $user2->assignRole($roleMember);

        $varian = "Double Choco, Banana Nutella, Lapis Surabaya, Tiramisu, Cheese, Peach Earl Grey";
        $arrVarian = explode(', ', $varian);

        $jsonVarian = json_encode($arrVarian);
        PilihanType::create([
            'nama_pilihan' => 'Varian Cake',
            'isi_pilihan' => $jsonVarian
        ]);

        $warna = "Merah, Biru Laut, Neon, Hijau Stabilo";
        $arrWarna = explode(', ', $warna);

        $jsonWarna = json_encode($arrWarna);
        PilihanColor::create([
            'nama_pilihan' => 'Warna Cupcake',
            'isi_pilihan' => $jsonWarna
        ]);

        WebSetting::create([
            'setting_name' => 'whatsapp',
            'value' => '6282175726466'
        ]);
        WebSetting::create([
            'setting_name' => 'facebook',
            'value' => 'https://www.facebook.com/arayacakepku/'
        ]);
        WebSetting::create([
            'setting_name' => 'instagram',
            'value' => 'https://www.instagram.com/arayacakepku/'
        ]);
        WebSetting::create([
            'setting_name' => 'tiktok',
            'value' => 'https://www.tiktok.com/@arayacakepekanbaru'
        ]);
    }
}
