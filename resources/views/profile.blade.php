<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $user->name }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

       
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 my-3 pt-3 shadow d-flex align-items-start">
                    <img src="{{ $user->image->url }}" class="rounded-circle me-3" alt="{{ $user->name }}">
                <div>
                            <h1>{{ $user->name }}</h1>
                            <h3>{{ $user->email }}</h3>
                        <p>
                            <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                            <strong>GitHub</strong>: {{ $user->profile->github }}<br>
                            <strong>Web</strong>: {{ $user->profile->web }}
                         </p>
                         <p>
                            <strong>País</strong>:{{ $user->location->country}}<br>
                            <strong>Nivel</strong>: @if ($user->level) 
                            <a href="#">{{ $user->level->name}}</a>
                            @else
                                ---
                            @endif <br>
                         </p>
                         <hr>
                         <p>
                            <strong>Grupos</strong>:
                            @forelse($user->groups as $group)
                                <span class="badge bg-primary">{{ $group->name }}</span>
                            @empty
                                <em>No pertenece a ningún grupo</em>
                            @endforelse
                        </p>


                         <hr>

                    </div>
                </div>
             </div>
        </div>
    </body>
</html>
