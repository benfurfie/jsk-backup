<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('pages:home');
Route::view('uses', 'pages.uses')->name('pages:uses');

Route::get('tags/{tag}', static function () {
    return view('pages.tags.view');
})->name('pages:tags:view');

Route::get('youtube', static function () {
    return view('pages.youtube.index');
})->name('pages:youtube:list');

Route::get('youtube/{youtube:slug}', static function () {
    return view('pages.youtube.view');
})->name('pages:youtube:view');

Route::get('packages', static function () {
    return view('pages.packages.index');
})->name('pages:packages:list');

Route::get('packages/{package:slug}', static function () {
    return view('pages.packages.view');
})->name('pages:packages:view');

Route::get('posts', static function () {
    return view('pages.posts.index');
})->name('pages:posts:list');

Route::get('{post:slug}', static function () {
    return view('pages.posts.view');
})->name('pages:posts:view');

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

// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);
