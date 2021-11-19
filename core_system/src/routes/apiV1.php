<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\SubjectController;

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
    Route::get('/{repositoryID}/projects', [])->name('repository.projects');
    Route::get('/{repositoryID}/projects/{projectID}/subjects', [])->name('repository.projects.subjects');
    Route::get('/{repositoryID}/subjects/{subjectID}/projects', [])->name('repository.subjects.projects');

    Route::post('/{repositoryID}/projects/{projectID}', [])->name('repository.projects.update');
    Route::post('/{repositoryID}/subjects/{subjectID}', [])->name('repository.subjects.update');
    Route::post('/{repositoryID}/projects/{projectID}/subjects/{subjectID}', [])->name('repository.projects.subjects.update');
    Route::post('/{repositoryID}/subjects/{subjectID}/projects/{projectID}', [])->name('repository.subjects.projects.update');

    Route::put('/{repositoryID}/subjects', [SubjectController::class, 'store'])->name('repository.subjects.store');
});
