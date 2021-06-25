<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/items',[SelectionController::class, 'index']);

Route::prefix('/selection')->group( function(){
    Route::put('/{id}',[SelectionController::class, 'update']); 
    Route::get('/{id}',[SelectionController::class, 'index_id']);
    }
);