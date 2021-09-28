<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/get/visitor', function (Request $request) {
//     return 'hfhh';
// });

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/user', function (Request $request) {
//         return $request->user();
//     });
//     Route::get('get/visitor', [VisitorController::class, 'getVisitor']);
// });

// Route::get('/get/visitor', [VisitorController::class, 'getVisitor']);

Route::group(['middleware' => ['auth:sanctum']], function(){
	Route::get('/userall', [UserController::class, 'getUserAll']);
    Route::get('/get/visitor', [VisitorController::class, 'getVisitor']);
    Route::post('/save/visitor', [VisitorController::class, 'saveRecords']);
});
