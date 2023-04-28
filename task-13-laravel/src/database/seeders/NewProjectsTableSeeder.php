<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $users = DB::table('new_users')->pluck('id')->toArray();
          $projects = [
            [
                'project_name' => 'Project 1',
                'user_id' => 1,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 1,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 2,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 3,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 3,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 4,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 4,
            ],
            [
                'project_name' => 'Project 3',
                'user_id' => 4,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 5,
            ],
            [
                'project_name' => 'Project 2',
                'user_id' => 5,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 6,
            ],
            [
                'project_name' => 'Project 1',
                'user_id' => 7,
            ],
        ];

        DB::table('new_projects')->insert($projects);
    }
}
