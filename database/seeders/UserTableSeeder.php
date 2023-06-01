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
        User::create([
            'name'=>'unicnepalexp',
            'username'=>'unicnepalexp',
            'email'=>'unicnepalexp@gmail.com',
            'password'=>bcrypt('unicnepalexp07'),
            'gender'=>'female',
            'image'=>'',
            'usertype'=>'admin',
            'status'=>1
        ]);
    }
}
