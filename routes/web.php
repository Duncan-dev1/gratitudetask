<?php

use App\Http\Controllers\CarAssignments\CarMechanicAssignmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/', [CarMechanicAssignmentController::class, 'index']);
Route::post('car-assignment', [CarMechanicAssignmentController::class, 'store']);
Route::put('car-assignment', [CarMechanicAssignmentController::class, 'update']);
Route::delete('car-assignment/{id}', [CarMechanicAssignmentController::class, 'destroy']);

