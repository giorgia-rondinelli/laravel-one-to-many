<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker ;
use App\Functions\Helper;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0;$i<20; $i++){
            $new_project= new Project();
            $new_project->title=$faker->sentence(2);
            $new_project->slug=Helper::generateSlug($new_project->title, new Project());
            $new_project->languages=$faker->word();
            $new_project->status=$faker->boolean();
            $new_project->commits=$faker->numberBetween(1,50);
            $new_project->description=$faker->text(60);
            $new_project->save();
        }

    }
}
