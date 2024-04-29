<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PreviousExperienceController;
use App\Http\Controllers\EducationQualificationController;
use App\Http\Controllers\FamilyMemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('admin/login',[AdminController::class,'login']);
Route::get('admin',[AdminController::class,'index']);
Route::post('admin/login',[AdminController::class,'submit_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

//Employee Resource
Route::get('employee/{id}/delete',[EmployeeController::class,'destroy']);
Route::resource('employee',EmployeeController::class);

//PreviousExperience Resource
Route::get('PreviousExperience/{id}/delete',[PreviousExperienceController::class,'destroy']);
Route::resource('PreviousExperience',PreviousExperienceController::class);

//EducationQualification Resource
Route::get('EducationQualification/{id}/delete',[EducationQualificationController::class,'destroy']);
Route::resource('EducationQualification',EducationQualificationController::class);

//FamilyMember Resource
Route::get('FamilyMember/{id}/delete',[FamilyMemberController::class,'destroy']);
Route::resource('FamilyMember',FamilyMemberController::class);