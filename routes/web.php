<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function(){
    Route::get("/profile/create", [UserController::class, 'create']);
    
});

Route::post("/profile/store", [UserController::class, 'store']);

Route::get("/profile/index", [UserController::class, 'index']);

Route::group(["middleware" => ["auth"]], function() {
    Route::resource('users', UserController::class);
    Route::post("/follow/{user}", [UserController::class, "follow"])->name("follow");
    Route::post("/unfollow/{user}", [UserController::class, "unfollow"])->name("unfollow");
});

Route::get("/profile/show", [UserController::class, 'show']);



require __DIR__.'/auth.php';
