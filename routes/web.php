<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    Route::resource('users', UserController::class);
    
    // create profile
    Route::get("/profile/create", [UserController::class, 'create']);
    
    // store user profiles
    Route::post("/profile/store", [UserController::class, 'store']);
    
    // show profile
    Route::get("/profile/show", [UserController::class, 'show'])->name("show");
    
    // edit profile
    Route::get("/profile/edit", [UserController::class, 'edit']);
    
    // update profile
    Route::put("/profile/update", [UserController::class, 'update']);
    
    // show user recommendations
    Route::get("/profile/index", [UserController::class, 'index'])->name("index");
    
    Route::post("/follow/{user}", [UserController::class, "follow"])->name("follow");
    Route::post("/unfollow/{user}", [UserController::class, "unfollow"])->name("unfollow");
    
});

    // click Edit button on the profile page
    // transfer from profile to edit profile page
    Route::get("/profile/edit", [UserController::class, 'edit'])->name("edit");
    
    Route::post("/messages/{user}", [MessageController::class, 'show'])->name("send_message");
    
    Route::resource('messages', MessageController::class)->middleware(["auth"]);
    
    Route::post("/followBack/{user}", [MessageController::class, "followBack"])->name("followBack");
    
require __DIR__.'/auth.php';
