<?php

use App\Http\Controllers\API\LecturersAPIController;
use App\Http\Controllers\API\SubjectsAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/lecturers', [LecturersAPIController::class, 'index']);
Route::get('/lecturers/{id}', [LecturersAPIController::class, 'show']);
Route::post('/lecturers', [LecturersAPIController::class, 'store']);
Route::put('/lecturers/{id}', [LecturersAPIController::class, 'update']);
Route::delete('/lecturers/{id}', [LecturersAPIController::class, 'destroy']);


Route::resource('api.subjects', SubjectsAPIController::class)->only('index','show', 'store', 'update', 'destroy');
