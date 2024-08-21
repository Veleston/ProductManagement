<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebHandler\AuthWebHandler;
use App\Http\Controllers\WebHandler\ListingWebHandler;
use Illuminate\Support\Facades\Route;


//This is a custom api Route
Route::middleware('auth:api')->group(function () {
    Route::post('/auth/signOut', [AuthController::class, 'logOut']);
    Route::post('/listing', [ListingWebHandler::class, 'showListings']);
});
Route::post('/auth/signin', [AuthWebHandler::class, 'login']);
