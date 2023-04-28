<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('new_users')->insert([
            ['name' => 'John Doe'],
            ['name' => 'Jane Smith'],
            ['name' => 'Bob Johnson'],
            ['name' => 'Jhon Snow'],
            ['name' => 'Raganar Lothbroke'],
            ['name' => 'Arya Stark'],
            ['name' => 'Denny'],

        ]);
    }
}
