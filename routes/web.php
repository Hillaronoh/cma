<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('new-user', function () {
    $user = new App\Models\User();
    $user->name = 'API User';
    $user->email = 'api@cms.com';
    $user->password = Hash::make('api123');
    $user->save();
    $token = $user->createToken('Personal Access Token');
    return ['token' => $token->plainTextToken];
});

Route::resource('contacts', ContactController::class);
Route::resource('groups', GroupController::class);
