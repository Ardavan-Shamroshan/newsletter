<?php

namespace Modules\PostCategory\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\PostCategory\Entities\PostCategory;
use Modules\PostCategory\Filter\PostCategoryFilter;

class PostCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        // $this->call("OthersTableSeeder");
        PostCategory::query()->create([
            'name' => 'Sports',
            'description' => 'دسته بندی ورزشی',
            'status' => 1
        ]);
        PostCategory::query()->create([
            'name' => 'Health',
            'description' => 'دسته بندی سلامت و تندرستی',
            'status' => 1
        ]);
        PostCategory::query()->create([
            'name' => 'Politics',
            'description' => 'دسته بندی سیاست',
            'status' => 1
        ]);
        PostCategory::query()->create([
            'name' => 'Economics',
            'description' => 'دسته بندی اقتصادی',
            'status' => 1
        ]);
        PostCategory::query()->create([
            'name' => 'Technology',
            'description' => 'دسته بندی تکنولوژی',
            'status' => 1
        ]);
    }
}
