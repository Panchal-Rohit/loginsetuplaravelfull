<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    
    public function run(): void
    {
        $user =User::where('email','admin@example.com')->first();
        if(!$user){
            $user = new User();
        }
        $user->name= 'Rohit';
        $user->email='rohitrantox@gmail.com';
        $user->password= Hash::make('admin123');
        $user->profile_image = 'admin-pannel/images/img.jpg';
        $user->save();
    }
}