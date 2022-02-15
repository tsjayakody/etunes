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

Route::get('/', [ClientController::class, 'showMainPage']);
Route::get('/client-signin', function () {
    return Inertia::render('ClientSignin');
})->name('client.signin');
Route::get('/client-signup', function () {
    return Inertia::render('ClientSignup');
})->name('client.signup')->middleware('signed');
Route::post('/getstartedpost', [ClientController::class, 'emailClientData'])->name('client.getstartedpost');
Route::get('/getstarted', function () {
    return Inertia::render('GetStarted');
})->name('client.getstarted');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    // Route for display dashboard
    Route::get('/', [\App\Http\Controllers\BackendController::class, 'showDashboardPage'])->name('dashboard');

    // Route for images page
    Route::get('/images', [\App\Http\Controllers\BackendController::class, 'showImagePage'])->name('images');

    // Route for create artist page
    Route::get('/artists/create', [\App\Http\Controllers\BackendController::class, 'viewCreateArtistPage'])->name('artists.create');
    // Route for get artist edit page
    Route::get('/artists/{id}', [\App\Http\Controllers\BackendController::class, 'showEditArtistPage'])->name('artists.edit');
    // Route for artist update
    Route::put('/artists/{id}', [\App\Http\Controllers\BackendController::class, 'updateArtist'])->name('artists.update');
    // Route for artist delete
    Route::delete('/artists/{id}', [\App\Http\Controllers\BackendController::class, 'destroyArtist'])->name('artists.destroy');
    // Route for artists page
    Route::get('/artists', [\App\Http\Controllers\BackendController::class, 'showArtistsPage'])->name('artists');
    // route for create new artist
    Route::post('/artists', [\App\Http\Controllers\BackendController::class, 'storeArtist'])->name('artists.store');

    // Route for store header image
    Route::post('/headerimage', [\App\Http\Controllers\BackendController::class, 'storeHeaderImage'])->name('headerimage.createupdate');

    // Route for store secondary image
    Route::post('/secondaryimage', [\App\Http\Controllers\BackendController::class, 'storeSecondaryImage'])->name('secondaryimage.createupdate');

    // Route for featured videos page
    Route::get('/featuredvideos', [\App\Http\Controllers\BackendController::class, 'showFeaturedVideosPage'])->name('featuredvideos');
    // Route for featured video edit page
    Route::get('/featuredvideos/{id}', [\App\Http\Controllers\BackendController::class, 'showFeaturedVideosEditPage'])->name('featuredvideos.edit');
    // Route for update featured video
    Route::put('/featuredvideos/{id}', [\App\Http\Controllers\BackendController::class, 'updateFeatuerdVideo'])->name('featuredvideos.update');
    // Route for delete featured video
    Route::delete('/featuredvideos/{id}', [\App\Http\Controllers\BackendController::class, 'destroyFeaturedVideo'])->name('featuredvideos.destroy');
    // Route for store featured video
    Route::post('/featuredvideos', [\App\Http\Controllers\BackendController::class, 'storeFeatuerdVideo'])->name('featuredvideos.store');

    // Route for register url generator page
    Route::get('/registerurl', [\App\Http\Controllers\BackendController::class, 'showRegisterUrlGenerator'])->name('registerurl');

    // Route for show profile settings page
    Route::get('/profilesettings', [\App\Http\Controllers\BackendController::class, 'showProfileSettings'])->name('profilesettings');

    // Route for change password
    Route::post('/profilesettings/password', [\App\Http\Controllers\BackendController::class, 'changePassword'])->name('profilesettings.password');

    // Route for change profile information
    Route::post('/profilesettings/profile', [\App\Http\Controllers\BackendController::class, 'changeProfileInformation'])->name('profilesettings.profile');
});

require __DIR__ . '/auth.php';
