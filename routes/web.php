<?php

use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SessionController;
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
    return Inertia::render('HomePage', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register')
    ]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
Route::inertia('/abouts', 'About');
// Route::get('products', function () {
//     return Inertia::render('Products/Show', []);
// })->name('products');


// Route::group(['prefix' => 'products'], function () {
//     Route::get('/', [ProductController::class, 'index'])->name('product.index');
// });
Route::get('/products', function () {
    return Inertia::render('Products/index');
});

Route::group(['prefix' => 'news'], function () {
    // Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{slug?}', [NewsController::class, 'index'])->name('news.index');
    Route::get('/newsDetail/{id}', [NewsController::class, 'Detailpost'])->where('id', '[0-9]+')->name('news.Detail');
});

Route::post('/contact', ContactController::class)->name('contact');

Route::group(['prefix' => 'session'], function () {
    // index or id
    // Route::get('/', [SessionController::class, 'index'])->where('page', '[0-9]+')->name('session.index');
    Route::get('/{id}', [SessionController::class, 'show'])->where('id', '[0-9]+')->name('session.show');
    Route::get('/{slug?}', [SessionController::class, 'index'])->where(['slug' => '[a-z0-9-]+'])->name('session.index');
});
