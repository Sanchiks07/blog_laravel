<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//posts
Route::get('/todos', [ToDoController::class, 'index']);

//categories
Route::get('/todos', [ToDoController::class, 'index']);