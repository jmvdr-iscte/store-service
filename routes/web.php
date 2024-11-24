<?php

use App\Http\Controllers\ServerController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

//projects
Route::post('/project', [ProjectController::class, 'store']);
Route::get('/project/{uid}', [ProjectController::class, 'show']);
Route::patch('/project/{uid}', [ProjectController::class, 'update']);

Route::get('/health', [ServerController::class, 'health']);
