<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/jobs', [JobController::class, 'index']);

Route::post('/jobs', [JobController::class, 'store']);

Route::delete('/jobs/{titulo}', [JobController::class,'delete']);
