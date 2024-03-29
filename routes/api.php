<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    //return $request->user();
    return 'loggedin';
});
Route::middleware('cors')->group(function () {
    Route::get('/', [ApiController::class, 'home']);
    Route::get('/news/{id}', [ApiController::class, 'NewsById']);
});

