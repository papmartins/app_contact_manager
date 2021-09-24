<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        \App\Models\Contact::factory(100)->count(100)->create();
    }
}
