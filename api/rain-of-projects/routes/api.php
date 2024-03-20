<?php

use App\Http\Controllers\api\TagController;
use App\Http\Controllers\api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\GroupController;
use App\Http\Controllers\api\ActivityHistoryController;
use App\Http\Controllers\api\TaskboardController;
use App\Http\Controllers\api\UserController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tags', [TagController::class, 'list']);
Route::get('/tags/{id}', [TagController::class, 'item']);
Route::post('/tags/create', [TagController::class, 'create']);
Route::put('/tags/{id}/update', [TagController::class, 'update']);


Route::get('/tasks', [TaskController::class, 'list']);
Route::get('/tasks/{id}', [TaskController::class, 'item']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::put('/tasks/{id}/update', [TaskController::class, 'update']);


Route::get('/projects', [ProjectController::class, 'list']);
Route::get('/projects/{id}', [ProjectController::class, 'item']);
Route::post('/projects/create', [ProjectController::class, 'create']);
Route::put('/projects/{id}/update', [ProjectController::class, 'update']);


Route::get('/groups', [GroupController::class, 'list']);
Route::get('/groups/{id}', [GroupController::class, 'item']);
Route::post('/groups/create', [GroupController::class, 'create']);
Route::put('/groups/{id}/update', [GroupController::class, 'update']);


Route::get('/activityhistories', [ActivityHistoryController::class, 'list']);
Route::get('/activityhistories/{id}', [ActivityHistoryController::class, 'item']);
Route::post('/activityhistories/create', [ActivityHistoryController::class, 'create']);
Route::put('/activityhistories/{id}/update', [ActivityHistoryController::class, 'update']);


Route::get('/taskboards', [TaskboardController::class, 'list']);
Route::get('/taskboards/{id}', [TaskboardController::class, 'item']);
Route::post('/taskboards/create', [TaskboardController::class, 'create']);
Route::put('/taskboards/{id}/update', [TaskboardController::class, 'update']);


Route::get('/users', [UserController::class, 'list']);
Route::get('/users/{id}', [UserController::class, 'item']);
Route::post('/users/create', [UserController::class, 'create']);
Route::put('/users/{id}/update', [UserController::class, 'update']);




Route::post('/login', [AuthController::class, 'login']);
