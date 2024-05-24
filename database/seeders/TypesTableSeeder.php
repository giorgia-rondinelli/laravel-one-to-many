<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker ;
use App\Functions\Helper;
use App\Models\Type;


class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i=0;$i<10; $i++){
            $new_type= new Type();
            $new_type->name=$faker->word();
            $new_type->slug=Helper::generateSlug($new_type->name, new Type());
            $new_type->save();

        }
    }
}
