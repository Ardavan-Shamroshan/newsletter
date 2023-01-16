<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserDatabaseSeeder extends Seeder
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

          // $this->call("OthersTableSeeder");
          $user = User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'user_type' => 1,
            'password' => Hash::make('password'),
        ]);

    }
}
