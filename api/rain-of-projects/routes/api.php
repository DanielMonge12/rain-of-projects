<?php

use App\Http\Controllers\api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tags', [TagController::class, 'list']);
Route::get('/tags/{id}', [TagController::class, 'item']);
Route::post('/tags/create', [TagController::class, 'create']);
Route::put('/tags/{id}/update', [TagController::class, 'update']);

