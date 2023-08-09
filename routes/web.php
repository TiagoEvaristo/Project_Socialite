<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/{provider}/redirect', function (string $provider) {
    return Socialite::driver($provider)->redirect();
});
 
Route::get('/auth/{provider}/callback', function (string $provider) {
    $providerUser = Socialite::driver($provider)->user();
    
    var_dump($providerUser);
    // $user = User::updateOrCreate([
    //     'github_id' => $githubUser->id,
    // ], [
    //     'name' => $githubUser->name,
    //     'email' => $githubUser->email,
    //     'github_token' => $githubUser->token,
    //     'github_refresh_token' => $githubUser->refreshToken,
    // ]);

    // auth()->login($user, true);

    // return redirect('/logged');
    // // $user->token
});

Route::get('/logged', function () {
    var_dump(auth()->user());
})->middleware('auth');