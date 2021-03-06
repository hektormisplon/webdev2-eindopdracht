<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Project', 10)->create()->each(function ($project) {
            $project->projectImages()->saveMany(factory(App\ProjectImage::class, 3)->make());
        });
    }
}
