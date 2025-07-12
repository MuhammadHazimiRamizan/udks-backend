<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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

// Public routes (tidak memerlukan authentication)
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Protected routes (memerlukan authentication dengan api_token)
Route::middleware('auth:api')->group(function () {
    
    // Auth routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [AuthController::class, 'profile']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
    });
    
    // User route (existing)
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // API untuk mengecek token validity
    Route::get('/check-token', function (Request $request) {
        return response()->json([
            'status' => 'success',
            'message' => 'Token is valid',
            'user' => $request->user()
        ]);
    });
    
});

// Route untuk testing API (bisa dihapus di production)
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API is working properly',
        'timestamp' => now()
    ]);
});