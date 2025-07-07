<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome');
//})->name('home');

Route::get('/', function () {
    return Inertia::render('HomePage');
})->name('home');

Route::get('/loginpage', function () { //login is a reserved word in laravel and routes to the official login page
    return Inertia::render('Login');
})->name('login');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
