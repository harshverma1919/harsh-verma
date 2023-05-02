<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class NewProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
       // $users = DB::table('new_users')->pluck('id')->toArray();
          $projects = [
            [
                'project_name' => 'Project 1',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 3',
                'user_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('new_projects')->insert($projects);
    }
}
