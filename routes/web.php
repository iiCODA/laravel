<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/capitalized-names', [UserController::class, 'getCapitalizedNames']);

Route::get('/validate-user', function () {
    return view('validate-user');
});

Route::post('/validateUser', [UserController::class, 'validateUser'])->name('validateUser');
