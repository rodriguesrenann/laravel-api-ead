<?php

use App\Http\Controllers\{CourseController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{course}', [CourseController::class, 'show']);

Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});