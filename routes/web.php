<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task_Controller;
use App\Http\Controllers\TodayTask_Controller;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/Task', Task_Controller::class);

Route::patch('/Task/{id}/done', [Task_Controller::class, 'markAsDone'])->name('Task.done');

Route::resource('/TodayTask', TodayTask_Controller::class);

Route::patch('/TodayTask/{id}/done', [TodayTask_Controller::class, 'markAsDone'])->name('TodayTask.done');
