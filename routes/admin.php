<?php

use App\Http\Controllers\AdminController;
use Illuminate\support\Facades\Route;

Route::middleware('auth', 'is_admin')->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.dashboard');
});

