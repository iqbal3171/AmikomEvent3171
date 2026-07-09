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

//Partner
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Http\Controllers\Admin\PartnerController;

// ================ MIDTRANS WEBHOOK =================
Route::post('/midtrans/callback', [App\Http\Controllers\MidtransWebhookController::class, 'handle']);


// ================= USER AREA =================
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

//Route::get('/checkout/{event}', [EventController::class, 'checkout'])->name('checkout');
Route::get('/checkout/{event}',[App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');

Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');

//Route::get('/checkout/{event}/create', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/paymment/{order_id}', [App\Http\Controllers\CheckoutController::class, 'payment'])->name('checkout.payment');

Route::get('/success/{order_id}', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');


// ================= ADMIN AREA =================
Route::prefix('admin')->name('admin.')->group(function () {

    // Rute Login (bebas akses tanpa middleware)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Route yang wajib admin role
    Route::middleware('admin')->group(function () {
        
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Events
        Route::get('/events', [AdminEventController::class, 'index'])->name('events');
        Route::get('/events/create', [AdminEventController::class, 'create'])->name('events.create');
        Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');

        // Transactions
        // Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');

        // Categories
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Partners
        Route::get('/partners', [PartnerController::class, 'index'])->name('partners.index');
        Route::get('/partners/create', [PartnerController::class, 'create'])->name('partners.create');
        Route::post('/partners/store', [PartnerController::class, 'store'])->name('partners.store');
        Route::get('/partners/edit/{id}', [PartnerController::class, 'edit'])->name('partners.edit');
        Route::post('/partners/update/{id}', [PartnerController::class, 'update'])->name('partners.update');
        Route::get('/partners/delete/{id}', [PartnerController::class, 'delete'])->name('partners.delete');

        // transaksi p10
        Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions');
    });

});