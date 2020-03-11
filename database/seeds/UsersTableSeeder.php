<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->where('email','ahmedadly132@gmail.com')->first();
        if(!$user){
            User::create([
                'name' => 'Ahmed Adly',
                'email' => 'ahmedadly132@gmail.com',
                'password' => Hash::make('242132000'),
                'role' => 'admin'
            ]);
        }
    }
}
