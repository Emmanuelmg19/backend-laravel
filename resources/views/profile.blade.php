<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $user->name }}</title>

       
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>{{ $user->name }}</h1>
                    <h3>{{ $user->email }}</h3>
                    <p>
                        <strong>Instagram</strong>: {{ $user->profile->instagram }}<br>
                        <strong>GitHub</strong>: {{ $user->profile->github }}<br>
                        <strong>Web</strong>: {{ $user->profile->web }}
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
