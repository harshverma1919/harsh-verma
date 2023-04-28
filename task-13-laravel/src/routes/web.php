<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return 'Hello, world!';
});
Route::get('/host/users', function () {
    return view('user');
});
Route::get('host/user/:userId/projects', function () {
    return view('project');
});
