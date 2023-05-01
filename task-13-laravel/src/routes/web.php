<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello, world!';
});
Route::get('/users', function () {
    return view('user');
});
Route::get('/users/projects/{recordId}', function () {
    return view('project');
});
