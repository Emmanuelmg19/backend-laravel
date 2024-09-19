<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory()->count(3)->create();

        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        User::factory()->count(5)->create()->each(function ($user) {
            
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());

            
            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(Image::factory()->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
        });
    }

    public function array($max)
    {
        $values = [];

        for ($i = 1; $i <= $max; $i++) {
            $values[] = $i;
        }

        return $values;
    }
}
