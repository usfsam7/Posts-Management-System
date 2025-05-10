<?php
use App\Http\Controllers\AJaxController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('posts', function () {
    return view('index');
});

Route::get('users', function () {
    return view('users.index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('posts/search', [PostController::class,'search']);

Route::middleware('auth')->group(function ()
 {

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts ', [PostController::class, 'store']);
    Route::get('posts/{id}', [PostController::class, 'show']);
    Route::post('posts/{id}', [PostController::class, 'update']);
    Route::get('posts/{id}/edit', [PostController::class, 'edit']);

    Route::delete('posts/{id}/', [PostController::class, 'destroy']);


    Route::get('/', [PostController::class, 'home']);
    Route::get('user/{id}/posts', [UserController::class, 'posts'])->name('user.posts');
    Route::resource('users', UserController::class);

        Route::resource('ajax', AJaxController::class);

 });



Auth::routes();
