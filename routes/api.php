<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\pendingController;
use App\Http\Controllers\StudentController;
use App\Models\paymentModel;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students', [StudentController::class, 'student']);
Route::get('students/{student_id}', [StudentController::class, 'studentById']);
Route::post('add_student', [StudentController::class, 'addStudent']);
Route::post('user_register', [loginController::class, 'userRegister']);
Route::post('login', [loginController::class, 'login']);
Route::post('add_payment', [paymentController::class, 'addPayment']);
Route::post('get_all_payment', [paymentController::class, 'getAllPayment']);
Route::post('add_pending', [pendingController::class, 'addPending']);
Route::post('get_all_pending', [pendingController::class, 'getAllPending']);
Route::post('update_payment/{id}', [paymentController::class, 'updatePayment']);
Route::post('update_pending/{id}', [pendingController::class, 'updatePending']);
Route::post('delete_payment/{id}', [paymentController::class, 'deletePayment']);
Route::post('delete_pending/{id}', [pendingController::class, 'deletePending']);
