<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServantController;
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
/////////////////////////////////////////////////////////////////////


