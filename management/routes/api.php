<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServantController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
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
/////////////////////////////////////////servants///////////////////////
Route::get('/servants' , [ServantController::class , 'getServant']);
Route::get('/servant/{id}' , [ServantController::class , 'getServantById']);
Route::post('/addServant' , [ServantController::class , 'addServant']);
Route::delete('/deleteServant/{id}' , [ServantController::class , 'deleteServant']);
Route::put('/updateServant/{id}' , [ServantController::class , 'updateServant']);


///////////////////////////////////applications//////////////////////////////////
Route::get('/applications' , [ApplicationController::class , 'getApplication']);
Route::get('/application/{id}' , [ApplicationController::class , 'getApplicationById']);
Route::delete('/deleteApplication/{id}' , [ApplicationController::class , 'deleteApplication']);
Route::put('/updateApplication/{id}' , [ApplicationController::class , 'updateApplication']);

//////////////////////////////////////////company/////////////////////////

Route::get('/companies' , [CompanyController::class , 'getCompany']);
Route::get('/company/{id}' , [CompanyController::class , 'getCompanyById']);
Route::delete('/deleteCompany/{id}' , [CompanyController::class , 'deleteCompany']);
Route::put('/updateCompany/{id}' , [CompanyController::class , 'updateCompany']);

////////////////////////////////////////////////////course/////////////////////////////////////

Route::get('/courses' , [CourseController::class , 'getCourse']);
Route::get('/courses/{id}' , [CourseController::class , 'getCourseById']);
Route::delete('/deleteCourse/{id}' , [CourseController::class , 'deleteCourse']);
Route::put('/updateCourse/{id}' , [CourseController::class , 'updateCourse']);

////////////////////////////////////////////////////////////



