<?php

use App\Http\Controllers\api\TagController;
use App\Http\Controllers\api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\GroupController;
use App\Http\Controllers\api\ActivityHistoryController;
use App\Http\Controllers\api\TaskboardController;
use App\Http\Controllers\api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for Tags
Route::get('/tags', [TagController::class, 'list']);
Route::get('/tags/{id}', [TagController::class, 'item']);
Route::post('/tags/create', [TagController::class, 'create']);
Route::put('/tags/{id}/update', [TagController::class, 'update']);
Route::delete('/tags/{id}/delete', [TagController::class, 'delete']); // Add delete route for Tags

// Routes for Tasks
Route::get('/tasks', [TaskController::class, 'list']);
Route::get('/tasks/{id}', [TaskController::class, 'item']);
Route::post('/tasks/create', [TaskController::class, 'create']);
Route::put('/tasks/{id}/update', [TaskController::class, 'update']);
Route::delete('/tasks/{id}/delete', [TaskController::class, 'delete']); // Add delete route for Tasks

// Routes for Projects
Route::get('/projects', [ProjectController::class, 'list']);
Route::get('/projects/{id}', [ProjectController::class, 'item']);
Route::post('/projects/create', [ProjectController::class, 'create']);
Route::put('/projects/{id}/update', [ProjectController::class, 'update']);
Route::delete('/projects/{id}/delete', [ProjectController::class, 'delete']); // Add delete route for Projects

// Routes for Groups
Route::get('/groups', [GroupController::class, 'list']);
Route::get('/groups/{id}', [GroupController::class, 'item']);
Route::post('/groups/create', [GroupController::class, 'create']);
Route::put('/groups/{id}/update', [GroupController::class, 'update']);
Route::delete('/groups/{id}/delete', [GroupController::class, 'delete']); // Add delete route for Groups

// Routes for Activity Histories
Route::get('/activityhistories', [ActivityHistoryController::class, 'list']);
Route::get('/activityhistories/{id}', [ActivityHistoryController::class, 'item']);
Route::post('/activityhistories/create', [ActivityHistoryController::class, 'create']);
Route::put('/activityhistories/{id}/update', [ActivityHistoryController::class, 'update']);
Route::delete('/activityhistories/{id}/delete', [ActivityHistoryController::class, 'delete']); // Add delete route for Activity Histories

// Routes for Taskboards
Route::get('/taskboards', [TaskboardController::class, 'list']);
Route::get('/taskboards/{id}', [TaskboardController::class, 'item']);
Route::post('/taskboards/create', [TaskboardController::class, 'create']);
Route::put('/taskboards/{id}/update', [TaskboardController::class, 'update']);
Route::delete('/taskboards/{id}/delete', [TaskboardController::class, 'delete']); // Add delete route for Taskboards

// Routes for Users
Route::get('/users', [UserController::class, 'list']);
Route::get('/users/{id}', [UserController::class, 'item']);
Route::post('/users/create', [UserController::class, 'create']);
Route::put('/users/{id}/update', [UserController::class, 'update']);
Route::delete('/users/{id}/delete', [UserController::class, 'delete']); // Add delete route for Users

// Login route
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login{id}', [AuthController::class, 'login']);
