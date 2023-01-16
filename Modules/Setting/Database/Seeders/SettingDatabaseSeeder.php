<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        DB::table('settings')->insert([
            'title' => 'عنوان سایت',
            'description' => 'توضیحات سایت',
            'terms' => 'مقررات سایت',
            'keywords' => 'کلمات کلیدی سایت',
            'email' => 'address@mail.com',
            'mobile' => '09123456789',
            'phone' => '012 - 1234567',
            'address' => 'آدرس',
            'copyright' => 'کپی رایت',
        ]);
    }
}
