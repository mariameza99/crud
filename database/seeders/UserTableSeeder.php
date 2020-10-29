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
        $user->save();
    }
}
