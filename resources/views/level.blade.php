<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios de {{ $level->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 my-3 pt-3 shadow">
                <h1>Contenido de usuarios nivel {{ $level->name}}</h1>
                <hr>
                    <!-- POSTS-->
                    <h3>Posts</h3>
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="row g-0 no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $post->image->url }}" class="img-fluid rounded-start" alt="{{ $post->name }}">
                                    </div>
                                    <div class="col-md-8 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->name }}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $post->category->name }} &bullet; 
                                                {{ $post->comments_count }} {{ Str::plural('comentario', $post->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
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
                    <h1>Contenido en video de usuarios nivel {{ $level->name}}</h1>
                <hr>
                    <div class="row">
                        @foreach($videos as $video)
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="row g-0 no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ $video->image->url }}" class="img-fluid rounded-start" alt="{{ $video->name }}">
                                    </div>
                                    <div class="col-md-8 p-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $video->name }}</h5>
                                            <h6 class="card-subtitle text-muted">
                                                {{ $video->category->name }} &bullet; 
                                                {{ $video->comments_count }} {{ Str::plural('comentario', $video->comments_count) }}
                                            </h6>
                                            <p class="card-text small">
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
