<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = new User();
        $user->name = 'Paulo Martins';
        $user->email = 'paulo_martins@sapo.pt';
        $user->password = 'pass1234';
        $user->save();
    }
}
