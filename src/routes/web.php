<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoodController;

Route::get('/moods',[MoodController::class,'index']);

Route::get('/moods/create',[MoodController::class,'create']);

Route::post('/moods',[MoodController::class,'store']);

Route::get('/moods/{id}/edit', [MoodController::class, 'edit']);
Route::put('/moods/{id}', [MoodController::class, 'update']);
Route::delete('/moods/{id}', [MoodController::class, 'destroy']);