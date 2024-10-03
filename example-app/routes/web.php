<?php

use App\Http\Controllers\ContactInformationController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'index');
});

Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
Route::post('/projects/store', [ProjectsController::class, 'store'])->name('projects.store');
Route::delete('/projects/delete/{id}', [ProjectsController::class, 'delete'])->name('projects.delete');
Route::put('/projects/update/{id}', [ProjectsController::class, 'update'])->name('projects.update');
Route::post('/contact-information/store', [ContactInformationController::class, 'store'])->name('contact-information.store');
