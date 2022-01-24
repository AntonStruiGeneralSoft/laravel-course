<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;

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

Route::get('/my_page', [ MyController::class, 'index' ]);

Route::get('/hello_world', function() {
    return 'Hello World!';
});

//Route::get('/posts', [ PostController::class, 'index' ]);

//Route::get('/posts/update', [ PostController::class, 'update' ]);

Route::get('/posts/delete', [ PostController::class, 'delete' ]);

Route::get('/posts/first_or_create', [ PostController::class, 'firstOrCreate' ]);

Route::get('/posts/update_or_create', [ PostController::class, 'updateOrCreate' ]);


/*
Route::get('/posts', [ PostController::class, 'index' ])->name('posts.index');

Route::get('/posts/create', [ PostController::class, 'create' ])->name('posts.create');

Route::post('/posts', [ PostController::class, 'store' ])->name('posts.store');

Route::get('/posts/{post}', [ PostController::class, 'show' ])->name('posts.show');

Route::get('/posts/{post}/edit', [ PostController::class, 'edit' ])->name('posts.edit');

Route::patch('/posts/{post}', [ PostController::class, 'update' ])->name('posts.update');

Route::delete('/posts/{post}', [ PostController::class, 'destroy' ])->name('posts.delete');
*/

Route::group(['namespace' => 'Post'], function() {
    Route::get('/posts', 'IndexController')->name('posts.index');

    Route::get('/posts/create', 'CreateController')->name('posts.create');

    Route::post('/posts', 'StoreController')->name('posts.store');

    Route::get('/posts/{post}', 'ShowController')->name('posts.show');

    Route::get('/posts/{post}/edit', 'EditController')->name('posts.edit');

    Route::patch('/posts/{post}', 'UpdateController')->name('posts.update');

    Route::delete('/posts/{post}', 'DestroyController')->name('posts.delete');
});


Route::get('/contacts', function() {
    return view('contacts');
})->name('contacts');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/main', function() {
    return view('main');
})->name('main');