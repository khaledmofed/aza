<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Redirect — Breeze expects a 'dashboard' route after login
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return auth()->user()?->is_admin
        ? redirect()->route('admin.dashboard')
        : redirect()->route('home');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/projects', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Laravel Breeze / Auth)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

        // Settings (single-page form, not a resource)
        Route::get('settings', [Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [Admin\SettingController::class, 'update'])->name('settings.update');

        // About (single-record, not a resource)
        Route::get('about', [Admin\AboutController::class, 'index'])->name('about.index');
        Route::put('about', [Admin\AboutController::class, 'update'])->name('about.update');
        Route::post('about/images', [Admin\AboutController::class, 'storeImage'])->name('about.images.store');
        Route::delete('about/images/{id}', [Admin\AboutController::class, 'destroyImage'])->name('about.images.destroy');

        // Resource routes
        Route::resource('sliders', Admin\SliderController::class);
        Route::resource('team', Admin\TeamController::class);
        Route::resource('portfolio', Admin\PortfolioController::class);
        Route::post('portfolio/{portfolio}/images', [Admin\PortfolioController::class, 'storeImage'])->name('portfolio.images.store');
        Route::delete('portfolio/images/{id}', [Admin\PortfolioController::class, 'destroyImage'])->name('portfolio.images.destroy');
        Route::resource('services', Admin\ServiceController::class);
        Route::resource('testimonials', Admin\TestimonialController::class);
        Route::resource('fun-facts', Admin\FunFactController::class)->parameters(['fun-facts' => 'funFact']);
        Route::resource('blog', Admin\BlogController::class);
        Route::post('blog/{blog}/images', [Admin\BlogController::class, 'storeImage'])->name('blog.images.store');
        Route::delete('blog/images/{id}', [Admin\BlogController::class, 'destroyImage'])->name('blog.images.destroy');
        Route::resource('messages', Admin\MessageController::class)->only(['index', 'show', 'destroy']);
        Route::patch('messages/{message}/read', [Admin\MessageController::class, 'markRead'])->name('messages.read');
        Route::resource('pages', Admin\PageController::class);
    });
