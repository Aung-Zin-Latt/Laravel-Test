<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\User\AddUserContactForm;
use App\Http\Livewire\User\UserDashboardComponent;

Route::get('/', HomeComponent::class)->name('home.index');


Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/servey/add', AddUserContactForm::class)->name('user.addform');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
