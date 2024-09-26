<?php

Route::get('/', function () {
    $users = App\Models\User::get();

    return view('welcome', ['users' => $users]);
});

Route::get('/profile/{id}', function ($id){

    $user = App\Models\User::find($id);
    
    return view('profile', [
        'user' => $user
    ]);

})->name('profile');