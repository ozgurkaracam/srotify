<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run(Faker $faker)
    {
        $d=['short','long'];
        for($i=0;$i<rand(3,10);$i++){
            $u=User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);
            for($j=0;$j<rand(3,15);$j++){
                $u->stories()->create([
                    'title'=>$faker->word,
                    'body'=>$faker->sentence,
                    'type'=>$d[rand(0,1)],
                    'status'=>rand(0,1)
                ]);
            }

        }
    }
}
