<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get("/student",[AdminController::class,"studentApi"]);
Route::post("/student/add",[AdminController::class,"addStudentApi"]);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
