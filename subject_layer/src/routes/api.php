<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\SubjectController;

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

Route::group(['prefix' => 'repositories'], function () {

    Route::get('/{repositoryID}/subjects', [SubjectController::class, 'index'])->name('repository.subjects');

    Route::get('/{repositoryID}/projects/{projectID}/subjects', [SubjectController::class, 'showSubjects'])->name('repository.projects.subjects');

    Route::post('/{repositoryID}/subjects', [SubjectController::class, 'store'])->name('repository.subjects.create');

    Route::post('/{repositoryID}/projects/{projectID}/subjects/{subjectID}', [SubjectController::class, 'update'])->name('repository.subjects.store');
});
