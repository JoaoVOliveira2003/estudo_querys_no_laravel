<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class,'insertDado']);

Route::get('/onetoone', [MainController::class,'oneToOne']);
Route::get('/onetomany', [MainController::class,'onetomany']);
Route::get('/belongsto', [MainController::class,'belongsto']);
Route::get('/manytomany', [MainController::class,'manytomany']);
Route::get('/runningqueries', [MainController::class,'runningqueries']);

Route::get('/colecction', [MainController::class,'colecction']);

