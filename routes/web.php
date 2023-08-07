<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/github/callback', function () {
    $user = Socialite::driver('github')->user();
 
    var_dump($user);
    // $user->token
});