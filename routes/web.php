<?php

use App\Http\Controllers\RedirectedUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// It is important to keep this route last on the list!
Route::get('/{hash}', [RedirectedUrlController::class, 'redirect']);
