<?php

use App\Livewire\Auth\Profile;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

// Livewire::setScriptRoute(function ($handle) {
//     return Route::get('/gresto/vendor/livewire/livewire.js', $handle);
// });

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/gresto/public/livewire/update', $handle);
});

Route::get('/', function () {
    return redirect()->route('login');
});



Route::middleware('auth')->group(function () {
    Route::get('/home', Home::class)->name('home');

    Route::get('/profile', \App\Livewire\Auth\Profile::class)->name('profile');

    Route::get('/menu', \App\Livewire\Menu\Index::class)->name('menu.index');

    Route::get('/customer', \App\Livewire\Customer\Index::class)->name('customer.index');

    Route::get('/transactions', \App\Livewire\Transaction\Index::class)->name('transaction.index');

    Route::get('/transaction/create', \App\Livewire\Transaction\Actions::class)->name('transaction.create');

    Route::get('/transaction/export', \App\Livewire\Transaction\Export::class)->name('transaction.export');

    Route::get('/transaction/{transaction}/edit', \App\Livewire\Transaction\Actions::class)->name('transaction.edit');

    Route::get('/transaction/{transaction}/imprimer', \App\Livewire\Transaction\Impression::class)->name('transaction.imprimer');


});

Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');
});
