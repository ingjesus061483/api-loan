<?php

use App\Http\Controllers\ArlController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmploymentInformationController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientPolicyController;
use App\Http\Controllers\AuthorizationPolicyController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentController;
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

Route::get('/',[HomeController::class,'index']);/* function () {
    return view('welcome');
});*/
Route::get('UnAutorize', function () {
    return view('Shared.UnAutorize');
});
Route::resource('authorizationPolicies',AuthorizationPolicyController::class);
Route::patch('clients/UpdateLawInformation/{id}',[ClientController::class,'UpdateLawInformation']);
Route::patch('clients/UpdatePatrimonialInformation/{id}',[ClientController::class,'UpdatePatrimonialInformation']);
Route::get('cities/GetCitiesByState/{stateId}',[CityController::class,'GetCitiesByState']);
Route::resource('contactinfo',ContactInfoController::class);
Route::resource('clients',ClientController::class);
Route::resource('employmentInformations', EmploymentInformationController::class);
Route::resource('loans', LoanController::class);
Route::post('login',[LoginController::class,'store']);
Route::delete('login/{id}',[LoginController::class,'destroy']);
Route::get('login/show',[LoginController::class,'show']);
Route::resource('arls',ArlController::class);
Route::resource('eps',EpsController::class);
Route ::resource('clientPolicies', ClientPolicyController::class);
Route::resource('DocumentType',DocumentTypeController::class);
Route::resource('documents',DocumentController::class);
