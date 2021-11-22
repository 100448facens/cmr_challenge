<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MockDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $r1 = \App\Models\Repository::create([
            'name' => 'Repository A'
        ]);
        $r2 = \App\Models\Repository::create([
            'name' => 'Repository B'
        ]);
        \App\Models\Repository::create([
            'name' => 'Repository C'
        ]);

        $s1 = \App\Models\Subject::create([
            'name' => 'Subject 11',
            'repository_id' => $r1->id,
        ]);
        \App\Models\Subject::create([
            'name' => 'Subject 12',
            'repository_id' => $r1->id,
        ]);
        \App\Models\Subject::create([
            'name' => 'Subject 13',
            'repository_id' => $r1->id,
        ]);
        \App\Models\Subject::create([
            'name' => 'Subject 21',
            'repository_id' => $r2->id,
        ]);

        \App\Models\Project::create([
            'name' => 'Project 11',
            'subject_id' => $s1->id,
            'repository_id' => $r1->id,
        ]);
        \App\Models\Project::create([
            'name' => 'Project 12',
            'subject_id' => $s1->id,
            'repository_id' => $r1->id,
        ]);
    }
}
