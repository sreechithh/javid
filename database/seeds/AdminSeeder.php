<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = Admin::create([
            'name' => 'Javid',
            'email' => 'javid@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $token1 = JWTAuth::fromUser($admin1); 
        $admin1->update(['api_token' => $token1]);

        $admin2 = Admin::create([
            'name' => 'Sreechit',
            'email' => 'sreejith@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $token2 = JWTAuth::fromUser($admin2); 
        $admin2->update(['api_token' => $token2]);
    }
}
