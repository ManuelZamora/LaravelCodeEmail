<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Archivos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/email', [AuthController::class, 'index']);
Route::post('send-verification-email', [AuthController::class, 'sendVerificationEmail']);
Route::get('verify-email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');


Route::get('upload', function() {
    $files = Storage::disk('spaces')->files('Codigos');

    return view('upload', compact('files'));
});

Route::post('upload', function() {
    Storage::disk('spaces')->putFile('Codigos', request()->file, 'public');

    return redirect()->back();
});

Route::post('prueba', [AuthController::class, 'crear']);
Route::delete('borrar', [AuthController::class, 'borrar']);
Route::get('traer', [AuthController::class, 'traer']);


include __DIR__ . '/api/v1/routes.php';


