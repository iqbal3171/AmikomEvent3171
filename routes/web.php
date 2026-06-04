<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;

// Admin Controller
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
<<<<<<< Updated upstream

=======
use App\Http\Controllers\Admin\PartnerController;
>>>>>>> Stashed changes

// ================= USER AREA =================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/event/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');

Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');


// ================= ADMIN AREA =================
Route::prefix('admin')->name('admin.')->group(function () {

    // Route Login (boleh diakses tanpa login)
    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');

    // Route yang wajib login + admin
    Route::middleware('admin')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Event
        Route::get('/events', [AdminEventController::class, 'index'])
            ->name('events');

        Route::get('/events/create', [AdminEventController::class, 'create'])
            ->name('events.create');

        Route::post('/events', [AdminEventController::class, 'store'])
            ->name('events.store');

<<<<<<< Updated upstream
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
=======
        Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])
            ->name('events.edit');

        Route::put('/events/{event}', [AdminEventController::class, 'update'])
            ->name('events.update');
>>>>>>> Stashed changes

        Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])
            ->name('events.destroy');

        // Transaction
        Route::get('/transactions', [TransactionController::class, 'index'])
            ->name('transactions');

        // Category
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('categories');

        Route::get('/categories/create', [CategoryController::class, 'create'])
            ->name('categories.create');

        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::put('/categories/{category}', [CategoryController::class, 'update'])
            ->name('categories.update');

        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
            ->name('categories.destroy');

        // Partner
        Route::get('/partners', [PartnerController::class, 'index'])
            ->name('partners.index');

        Route::get('/partners/create', [PartnerController::class, 'create'])
            ->name('partners.create');

        Route::post('/partners/store', [PartnerController::class, 'store'])
            ->name('partners.store');

        Route::get('/partners/edit/{id}', [PartnerController::class, 'edit'])
            ->name('partners.edit');

        Route::post('/partners/update/{id}', [PartnerController::class, 'update'])
            ->name('partners.update');

        Route::get('/partners/delete/{id}', [PartnerController::class, 'delete'])
            ->name('partners.delete');
    });
});