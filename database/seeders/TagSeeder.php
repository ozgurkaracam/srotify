<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
//        for ($i=0;$i<40;$i++)
//            Tag::create(['title'=>$faker->word]);
        foreach (Tag::all() as $tag){
            $tag->stories()->attach(Story::all()->random(rand(1,5)));
        }
    }
}
