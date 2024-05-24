<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker ;
use App\Functions\Helper;
use App\Models\Technology;


class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0;$i<10; $i++){
            $new_technology= new Technology();
            $new_technology->name=$faker->word();
            $new_technology->slug=Helper::generateSlug($new_technology->name, new Technology());
            $new_technology->save();

        }
    }
}
