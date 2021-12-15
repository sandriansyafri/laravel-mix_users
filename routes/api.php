<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('users', [AuthController::class, 'index']);
Route::post('users', [AuthController::class, 'store']);
Route::post('users/photo/{id}', [AuthController::class, 'upload']);
Route::get('users/{id}', [AuthController::class, 'show']);
Route::put('users/{id}', [AuthController::class, 'update']);
Route::delete('users/{id}', [AuthController::class, 'destroy']);
