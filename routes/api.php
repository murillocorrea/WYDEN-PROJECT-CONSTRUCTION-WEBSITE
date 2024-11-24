<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;


Route::post('/projects', [ProjectsController::class, 'store']);
Route::delete('/projects/{id}', [ProjectsController::class, 'delete']);