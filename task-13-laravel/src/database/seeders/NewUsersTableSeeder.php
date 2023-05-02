<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $now = Carbon::now();
        DB::table('new_users')->insert([
            ['name' => 'John Doe', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jane Smith', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Bob Johnson', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jhon Snow', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Raganar Lothbroke', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Arya Stark', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Denny', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
