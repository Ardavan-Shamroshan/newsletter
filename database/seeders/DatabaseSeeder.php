<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Post\Database\Seeders\PostDatabaseSeeder;
use Modules\PostCategory\Database\Seeders\PostCategoryDatabaseSeeder;
use Modules\Setting\Database\Seeders\SettingDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserDatabaseSeeder::class,
            PostCategoryDatabaseSeeder::class,
            PostDatabaseSeeder::class,
            SettingDatabaseSeeder::class,
        ]);


    }
}
