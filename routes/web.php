<?php

use Illuminate\Support\Facades\Route;

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

Route::group([], function () {

	Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home');
	Route::get('/about', [\App\Http\Controllers\Frontend\AboutController::class,'index'])->name('about');
	Route::get('/staffs', [\App\Http\Controllers\Frontend\StaffController::class,'index'])->name('staffs');
	Route::get('/staffs/{slug}', [\App\Http\Controllers\Frontend\StaffController::class,'show'])->name('staffs.show');
	Route::resource('/posts', \App\Http\Controllers\Frontend\PostController::class);
	Route::get('/posts/{slug}', [\App\Http\Controllers\Frontend\PostController::class, 'show'])->name('posts.show');
	Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\PostController::class, 'PostByCategory'])->name('category');
	Route::get('/search',[\App\Http\Controllers\Frontend\PostController::class , 'search'])->name('search');
	Route::get('/services', [\App\Http\Controllers\Frontend\ServiceController::class,'index'])->name('services');
	Route::get('/services/{slug}', [\App\Http\Controllers\Frontend\ServiceController::class,'show'])->name('services.show');
	Route::get('/contact', "\App\Http\Controllers\Frontend\ContactController@index")->name('contact');
	Route::post('/book', "\App\Http\Controllers\Frontend\FeedbackController@store")->name('feedback');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('sitemap-create', function () {
	Artisan::call('sitemap:create');

	return 'xong';
});

Route::get('clear-cache', function () {
	\Artisan::call('config:cache');
	\Artisan::call('cache:clear');
  \Artisan::call('view:clear');
  \Artisan::call('route:clear');
//    Artisan::call('cms:publish:assets');
//    Artisan::call('storage:link');
	return 'xong';
});