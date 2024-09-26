<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Level;
use App\Models\Profile;
use App\Models\Location;
use App\Models\Image;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear grupos
        Group::factory()->count(3)->create();

        // Crear niveles
        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        // Crear tags
        $tags = Tag::factory()->count(12)->create();

        // Crear usuarios con perfil, ubicación, y grupo
        User::factory()->count(5)->create()->each(function ($user) {
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());

            $user->groups()->attach($this->array(rand(1, 3)));

            $user->image()->save(Image::factory()->make([
                'url' => 'https://lorempixel.com/90/90/'
            ]));
        });

        // Crear categorías y posts
        Category::factory()->count(4)->create();
        Post::factory()->count(12)->create();

        // Crear posts con imagen, tags y comentarios
        Post::factory()->count(40)->create()->each(function ($post) use ($tags) {
            $post->image()->save(Image::factory()->make());
            $post->tags()->attach($tags->random(rand(1, 12))->pluck('id')->toArray());

            $number_comments = rand(1, 6);
            for ($i = 0; $i < $number_comments; $i++) {
                $post->comments()->save(Comment::factory()->make());
            }
        });

        // Crear videos con imagen, tags y comentarios
        Video::factory()->count(40)->create()->each(function ($video) use ($tags) {
            $video->image()->save(Image::factory()->make());
            $video->tags()->attach($tags->random(rand(1, 12))->pluck('id')->toArray());

            $number_comments = rand(1, 6);
            for ($i = 0; $i < $number_comments; $i++) {
                $video->comments()->save(Comment::factory()->make());
            }
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

