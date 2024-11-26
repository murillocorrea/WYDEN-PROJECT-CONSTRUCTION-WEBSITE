<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ContactInformationController;

Route::post('/projects/get', [ProjectsController::class, 'getProjects']);
Route::post('/projects', [ProjectsController::class, 'store']);
Route::delete('/projects/{id}', [ProjectsController::class, 'delete']);


Route::post('/contact-information/store', [ContactInformationController::class, 'store']);
