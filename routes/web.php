<?php

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;


Route::get('/', [SiteController::class, 'home']);

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/supports/create', [ SupportController::class, 'create'])->name('supports.create');;

Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');