<?php

use App\Http\Controllers\Data_Base\DataBaseController;
use App\Http\Controllers\Design\DesignController;
use App\Http\Controllers\Education\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\Framework\FrameworkController;
use App\Http\Controllers\Passion\PassionController;
use App\Http\Controllers\Skill\SkillController;
use App\Http\Controllers\User\UserController;
use App\Models\Framework;
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
Route::apiResource('user', UserController::class);
// Route::post('updateUser/{id}',[UserController::class,"update"]);
Route::apiResource('experience', ExperienceController::class);
Route::apiResource('education', EducationController::class);
Route::apiResource('framework', FrameworkController::class);
Route::apiResource('dataBase', DataBaseController::class);
Route::apiResource('design', DesignController::class);
Route::apiResource('skill', SkillController::class);
Route::apiResource('passion', PassionController::class);
Route::get('acceuil',[PassionController::class,"redirection"]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
