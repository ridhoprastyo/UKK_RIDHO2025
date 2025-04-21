<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task_Controller;
use App\Http\Controllers\TodayTask_Controller;

Route::get('/', function () {
    return view('welcome');
});




