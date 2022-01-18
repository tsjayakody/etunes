<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/client-signin', function () {
    return Inertia::render('ClientSignin');
})->middleware(['auth', 'verified'])->name('client.signin');
Route::get('/client-signup', function () {
    return Inertia::render('ClientSignup');
})->middleware(['auth', 'verified'])->name('client.signup');

require __DIR__.'/auth.php';
