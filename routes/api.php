<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//register==login==logout
Route::post('register',[\App\Http\Controllers\RegisterController::class,'register']);
Route::post('login',[\App\Http\Controllers\RegisterController::class,'login']);
Route:: post('logout',[\App\Http\Controllers\RegisterController::class,'logout']);
//===========================================================================
// routes for admin to crud exercises
Route::prefix("exercises")->group(function(){
   // Route::get('/indexexercise',[\App\Http\Controllers\ExerciseAController::class,'indexexercise']);
    Route::get('/',[\App\Http\Controllers\ExerciseAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\ExerciseAController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\ExerciseAController::class,'show']);
    Route::put('/{exercise}',[\App\Http\Controllers\ExerciseAController::class,'update']);
    Route::delete('/{exercise}',[\App\Http\Controllers\ExerciseAController::class,'destroy']);
});
//routes to create and show the goals
Route::prefix("goals")->group(function(){
    Route::get('/',[\App\Http\Controllers\GoalController::class,'index']);
    Route::post('/',[\App\Http\Controllers\GoalController::class,'store']);
});
//routes to create and show the levels
Route::prefix("levels")->group(function (){
    Route::get('/',[\App\Http\Controllers\LevelAdController::class,'index']);
    Route::post('/',[\App\Http\Controllers\LevelAdController::class,'store']);
});
//routes to CRUD sport programs
Route::prefix("sport_programs")->group(function (){
    Route::get('/',[\App\Http\Controllers\ProgramAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\ProgramAController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\ProgramAController::class,'show']);
    Route::put('/{program}',[\App\Http\Controllers\ProgramAController::class,'update']);
    Route::delete('/{program}',[\App\Http\Controllers\ProgramAController::class,'destroy']);
});
//to show and create days
Route::prefix("days")->group(function (){
    Route::get('/index',[\App\Http\Controllers\DayAController::class,'index']);
    Route::post('/create',[\App\Http\Controllers\DayAController::class,'store']);
});
//====================================================================================
//route to CRUD organic program
Route::prefix("organics")->group(function (){
    Route::get('/',[\App\Http\Controllers\OrganicAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\OrganicAController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\OrganicAController::class,'show']);
    Route::put('/{program}',[\App\Http\Controllers\OrganicAController::class,'update']);
    Route::delete('/{program}',[\App\Http\Controllers\OrganicAController::class,'destroy']);
});
//==========================================================================
//Route to CRUD categories
Route::prefix("categories")->group(function(){
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index']);
    Route::post('/',[\App\Http\Controllers\CategoryController::class,'store'])->middleware('check_admin');
    Route::get('/{id}',[\App\Http\Controllers\CategoryController::class,'show']);
    Route::put('/{category}',[\App\Http\Controllers\CategoryController::class,'update'])->middleware('check_admin');
    Route::delete('/{category}',[\App\Http\Controllers\CategoryController::class,'destroy'])->middleware('check_admin');
});
//=================================================================================
//parts routes
Route::prefix("parts")->group(function(){
    Route::get('/',[\App\Http\Controllers\PartAController::class,'index']);
    Route::post('/',[\App\Http\Controllers\PartAController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\PartAController::class,'show']);
    Route::put('/{part}',[\App\Http\Controllers\PartAController::class,'update'])->middleware('check_admin');
    Route::delete('/{part}',[\App\Http\Controllers\PartAController::class,'destroy'])->middleware('check_admin');
});
//Route::get('/indexexercise',[\App\Http\Controllers\ExerciseAController::class,'indexexercise']);
