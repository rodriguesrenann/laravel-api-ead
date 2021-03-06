<?php

use App\Http\Controllers\Api\{CourseController, LessonController, ModuleController, SupportController, SupportReplyController};
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/courses', [CourseController::class, 'index']);
    Route::get('/courses/{id}', [CourseController::class, 'show']);
    Route::get('/courses/{id}/modules', [ModuleController::class, 'index']);
    Route::get('/modules/{id}/lessons', [LessonController::class, 'index']);
    Route::get('/lessons/{id}', [LessonController::class, 'show']);
    Route::get('/my-supports', [SupportController::class, 'mySupports']);
    Route::get('/supports', [SupportController::class, 'index']);
    Route::post('/supports', [SupportController::class, 'store']);
    Route::post('/replies', [SupportReplyController::class, 'store']);
    Route::get('/myreplies', [SupportReplyController::class, 'index']);
});



Route::get('/', function () {
    return response()->json([
        'success' => true
    ]);
});
