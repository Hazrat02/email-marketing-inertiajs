<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Artisan;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');
Route::get('/domain-find', function () {
    return Inertia::render('DomainSearch');
})->name('domain');



Route::post('/contact', [ContactController::class, 'sendBulkMail'])->name('contact.send');
Route::post('/smtp/store', [ContactController::class, 'store'])->name('smtp.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [dashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/mail',[dashboardController::class, 'sendBulkMail'])->name('mail');
    Route::post('/set/template',[dashboardController::class, 'setTemplate'])->name('set.template');

});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');

    return "<h3>Cache cleared successfully!</h3>";
});