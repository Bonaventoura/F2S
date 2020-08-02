<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = 'admin1234';
        User::create([
            'name'=>'admin',
            'username'=>'Admin',
            'email'=>'admin@test.com',
            'password'=> Hash::make('admin1234')
        ]);
    }
}
