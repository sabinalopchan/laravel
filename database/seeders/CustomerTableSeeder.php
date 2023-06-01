<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerRegister;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CustomerRegister::create([
            'firstname'=>'ram',
            'lastname'=>'ram',
            'email'=>'ram@gmail.com',
            'password'=>bcrypt(12345),
        ]);
    }
}
