<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantDetailsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("applicant", [ApplicantDetailsController::class, 'index']);
Route::get("applicant/create", [ApplicantDetailsController::class, 'create']);
Route::post("saveApplicantData", [ApplicantDetailsController::class, 'store']);
Route::post("showApplicantData", [ApplicantDetailsController::class, 'show']);
Route::post("editApplicantData", [ApplicantDetailsController::class, 'edit']);
Route::post("updateApplicantData", [ApplicantDetailsController::class, 'update']);
Route::post("deleteApplicantData", [ApplicantDetailsController::class, 'destroy']);