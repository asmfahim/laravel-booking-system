<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usr = User::where('email','admin@gmail.com')->first();
        if(is_null($usr)){

            $admin = new User();
            $admin->fname = "John";
            $admin->lname = "Deo";
            $admin->email = "admin@gmail.com";
            $admin->password = Hash::make('password');
            $admin->save();
            $admin->assignRole('admin');
        }
    }
}
