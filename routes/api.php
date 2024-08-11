<?php

use App\Http\Controllers\api\ApiBlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('posts' ,ApiBlogController:: class);

Route::get('/posts' , [ApiBlogController::class, 'index']);
Route::post('/posts/add-post' , [ApiBlogController::class, 'submitPost']);
Route::get('/posts/{id}' , [ApiBlogController::class, 'showSinglePost']);
Route::put('posts/post-edit/{id}', [ApiBlogController::class, 'updateRecord']);
Route::delete('posts/post-delete/{id}', [ApiBlogController::class, 'deleteRecord'])->name('delete');


