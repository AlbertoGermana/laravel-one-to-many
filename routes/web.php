<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'taskController@index')->name('home');

// TASKS
Route::get('/scelta/{id}', 'taskController@showTask')->name('showTask');
// -> create
Route::get('/create', 'taskController@createTask')->name('createTask');
Route::post('/store', 'taskController@storeTask')->name('storeTask');
// -> update
Route::get('/edit/{id}', 'taskController@editTask')->name('editTask');
Route::post('/update/{id}', 'taskController@updateTask')->name('updateTask');
// -> delete
Route::get('/delete/{id}', 'taskController@deleteTask')->name('deleteTask');
