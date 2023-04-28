<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Books\BooksController;
use App\Http\Controllers\NewUserController;
use App\Http\Controllers\NewProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.basic')->group(function () {
    Route::apiResource('books', BooksController::class);
});

Route::get('/', function () {
    return response()->json([
        'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
    ]);
});
Route::get('/new_users', [NewUserController::class, 'index'])->name('new_users.index');
Route::post('/new_users', [NewUserController::class, 'store']);
Route::put('/new_users/{id}', [NewUserController::class, 'update']);
Route::get('/new_projects', [NewProjectController::class, 'index'])->name('new_projects.index');
Route::delete('/new_projects/{id}', [NewProjectController::class, 'destroy']);
Route::post('/new_projects', [NewProjectController::class, 'store']);
Route::put('/new_projects/{id}', [NewProjectController::class, 'update']);
Route::get('/new_projects/{user_id}', [NewProjectController::class, 'getUserProjects']);
Route::get('/new_users/{user_id}', [NewUserController::class, 'getUserProjects']);
//Route::get('/users/{userId}/projects', [\App\Http\Controllers\NewUserController::class, 'getUserProjects']);