<?php

use App\Http\Controllers\LecturersController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\IsAdmin;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('lecturers.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/setLanguage/{lang}', [App\Http\Controllers\LangController::class, 'setLanguage'])->name('setLanguage');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/lecturers', [LecturersController::class,'index'])->name('lecturers.index');
    Route::resource('subjects', SubjectController::class)->only(['index']);

    Route::group(['middleware' => [IsAdmin::class]], function () {
        Route::resource('subjects', SubjectController::class)->except(['index']);

        Route::get('/lecturers/create', [LecturersController::class,'create'])->name('lecturers.create');
        Route::post('/lecturers', [LecturersController::class,'store'])->name('lecturers.store');
        Route::get('/lecturers/{lecturer}', [LecturersController::class,'edit'])->name('lecturers.edit');
        Route::put('/lecturers/{lecturer}', [LecturersController::class,'update'])->name('lecturers.update');
        Route::get('/lecturers/{lecturer}/delete', [LecturersController::class,'delete'])->name('lecturers.delete');
     });

});
