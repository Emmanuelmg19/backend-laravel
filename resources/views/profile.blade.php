<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $user->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1, h3 {
            color: #343a40;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .badge {
            font-size: 0.9rem;
        }
        .img-fluid {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .tags-container {
            max-height: 50px; /* Ajusta según lo necesario */
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 my-3 p-4 shadow-sm rounded bg-white d-flex align-items-start">
                <!-- Perfil de Usuario -->
                <img src="{{ $user->image->url }}" class="rounded-circle me-4" alt="{{ $user->name }}" style="width: 100px; height: 100px;">
                <div>
                    <h1>{{ $user->name }}</h1>
                    <h3>{{ $user->email }}</h3>
                    <p class="mt-3">
                        <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                        <strong>GitHub</strong>: {{ $user->profile->github }}<br>
                        <strong>Web</strong>: {{ $user->profile->web }}
                    </p>
                    <p>
                        <strong>País</strong>: {{ $user->location->country }}<br>
                        <strong>Nivel</strong>: 
                        @if ($user->level)
                            <a href="{{ route('level', $user->level->id) }}" class="text-decoration-none">
                                {{ $user->level->name }}
                            </a>
                        @else
                            ---
                        @endif
                    </p>
                    <hr>
                    <!-- Grupos -->
                    <p>
                        <strong>Grupos</strong>:
                        @forelse($user->groups as $group)
                            <span class="badge bg-primary">{{ $group->name }}</span>
                        @empty
                            <em>No pertenece a ningún grupo</em>
                        @endforelse
                    </p>
                    <hr>
                    <!-- POSTS -->
                    <h3>Posts</h3>
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="img-fluid rounded-start" alt="{{ $post->name }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->name }}</h5>
                                            <h6 class="card-subtitle text-muted mb-2">
                                                {{ $post->category->name }} &bullet; 
                                                {{ $post->comments_count }} {{ Str::plural('comentario', $post->comments_count) }}
                                            </h6>
                                            <p class="card-text tags-container">
                                                @foreach($post->tags as $tag)
                                                    <span class="badge bg-light text-dark">#{{ $tag->name }}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- VIDEOS -->
                    <h3>Videos</h3>
                    <div class="row">
                        @foreach($videos as $video)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ $video->image->url }}" class="img-fluid rounded-start" alt="{{ $video->name }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $video->name }}</h5>
                                            <h6 class="card-subtitle text-muted mb-2">
                                                {{ $video->category->name }} &bullet; 
                                                {{ $video->comments_count }} {{ Str::plural('comentario', $video->comments_count) }}
                                            </h6>
                                            <p class="card-text tags-container">
                                                @foreach($video->tags as $tag)
                                                    <span class="badge bg-light text-dark">#{{ $tag->name }}</span>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-4mohGQsGSkx6lBmI6KAuJsq7l4A6l56D8FQXB6t9ztk4Mvd4IAItfeTHTOcRzgFR" crossorigin="anonymous"></script>
</body>
</html>
