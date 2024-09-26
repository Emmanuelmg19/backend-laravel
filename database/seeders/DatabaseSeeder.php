<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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

        // Crear usuarios con perfil, ubicación, grupo e imagen
        User::factory()->count(5)->create()->each(function ($user) {
            $profile = $user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());

            // Asignar grupos
            $user->groups()->attach($this->array(rand(1, 3)));

            // Guardar imagen polimórfica
            $user->image()->create([
                'url' => 'https://picsum.photos/90/90/',
            ]);
        });

        // Crear categorías
        Category::factory()->count(4)->create();

        // Crear posts con imagen, tags y comentarios
        Post::factory()->count(40)->create()->each(function ($post) use ($tags) {
            // Guardar imagen del post
            $post->image()->create([
                'url' => 'https://picsum.photos/1024/768?random=' . rand(1, 1000) . '&t=' . time(),
            ]);

            // Asignar tags
            $post->tags()->attach($tags->random(rand(1, 12))->pluck('id')->toArray());

            // Guardar comentarios
            Comment::factory()->count(rand(1, 6))->create([
                'commentable_id' => $post->id,
                'commentable_type' => Post::class,
            ]);
        });

        // Crear videos con imagen, tags y comentarios
        Video::factory()->count(40)->create()->each(function ($video) use ($tags) {
            // Guardar imagen del video
            $video->image()->create([
                'url' => 'https://picsum.photos/1024/766?random=' . rand(1, 1000) . '&t=' . time(),
            ]);

            // Asignar tags
            $video->tags()->attach($tags->random(rand(1, 12))->pluck('id')->toArray());

            // Guardar comentarios
            Comment::factory()->count(rand(1, 6))->create([
                'commentable_id' => $video->id,
                'commentable_type' => Video::class,
            ]);
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

