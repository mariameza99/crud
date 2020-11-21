<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Maria Meza";
        $user->email = "maria@gmail.com";
        $user->password = bcrypt("hola12345");
        $user->role_id = "1";
        $user->save();

        $user = new User();
        $user->name = "Mary Meza";
        $user->email = "maria5@gmail.com";
        $user->password = bcrypt("hola12345");
        $user->role_id = "2";
        $user->save();
    }
}
