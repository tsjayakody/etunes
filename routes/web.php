<?php

use App\Http\Controllers\ClientController;
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
Route::get('/client-signin', function () {
    return Inertia::render('ClientSignin');
})->name('client.signin');
Route::get('/client-signup', function () {
    return Inertia::render('ClientSignup');
})->name('client.signup');
Route::post('/getstartedpost', [ClientController::class, 'emailClientData'])->name('client.getstartedpost');
Route::get('/getstarted', function () {
    return Inertia::render('GetStarted');
})->name('client.getstarted');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Route for display dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Route for main images page
    Route::get('/images', function () {
        return Inertia::render('Images');
    })->name('images');

    // Route for main images page
    Route::get('/artists', function () {
        return Inertia::render('Artists');
    })->name('artists');
});


require __DIR__ . '/auth.php';
