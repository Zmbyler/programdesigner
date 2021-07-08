<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'user', 'namespace' => 'Api'], function () {
    Route::post('/register', 'AuthController@store');
    Route::post('/login', 'AuthController@login');
    Route::post('/forgotPassword', 'AuthController@forgotPassword');

    Route::get('/cms/{slug}', 'CmsController@cms');

    Route::get('/getcontactPage', 'ContactController@getcontactPage');

    /*homepage api section*/
    Route::get('/homepage', 'HomepageController@homePage');
    /*homepage api end*/

    /*plan section start*/
    Route::get('/plans', 'PlanController@index');
    /*end plan section*/

    /*contact section start*/
    Route::post('/contactUs', 'ContactController@contactUs');
    /*end contact section*/

    /*masterdata section start*/
    Route::get('/day', 'MasterController@day');
    Route::get('/assessmentCategory', 'MasterController@assessmentCategory');
    Route::get('/country', 'MasterController@country');
    Route::get('/bestDescription', 'MasterController@bestDescription');
    Route::get('/businessDescription', 'MasterController@businessDescription');
    Route::get('/blockFocusList', 'MasterController@blockFocusList');
    Route::get('/athleteProfileList', 'MasterController@athleteProfileList');
    Route::get('/seasonList', 'MasterController@seasonList');
    Route::get('/sportList', 'MasterController@sportList');
    Route::get('/trainingAgeList', 'MasterController@trainingAgeList');
    Route::get('/programGoalList', 'MasterController@programGoalList');
    /*end masterdata*/

    /*Auth route section*/
    Route::group(['middleware'=>'auth:api'], function () {

        /*Auth section start*/
        Route::get('logout', 'AuthController@logout');
        Route::get('/profile', 'AuthController@profile');
        Route::post('/changePassword', 'AuthController@changePassword');
        Route::post('/profileUpdate', 'AuthController@profileUpdate');
        /*Auth section end*/

        /*Program Template section start*/
        Route::get('/getTemplate', 'ProgramTemplateController@getTemplate');
        Route::get('/getTemplateType', 'ProgramTemplateController@getTemplateType');
        Route::post('/createTemplate', 'ProgramTemplateController@createTemplate');
        Route::get('/editTemplate/{id}', 'ProgramTemplateController@editTemplate');
        Route::post('/updateTemplate', 'ProgramTemplateController@updateTemplate');
        Route::get('/deleteTemplate/{id}', 'ProgramTemplateController@deleteTemplate');
        Route::post('/programTemplateList', 'ProgramTemplateController@programTemplateList');
        /*Program Template section end*/

        /*Program management section start*/
        Route::post('/saveUserProgram', 'UserProgramManagementController@saveUserProgram');
        Route::get('/fetchLastProgram/{id}', 'UserProgramManagementController@fetchLastProgram');
        Route::post('/saveProgramControl', 'UserProgramManagementController@saveProgramControl');
        Route::post('/fetchProgramChartDetails', 'UserProgramManagementController@fetchProgramChartDetails');
        Route::get('/getAllProgram', 'UserProgramManagementController@getAllProgram');
        Route::get('/editProgramChartDetails/{id}', 'UserProgramManagementController@editProgramChartDetails');
        Route::get('/deleteProgram/{id}', 'UserProgramManagementController@deleteProgram');
        Route::post('/updateProgramControl', 'UserProgramManagementController@updateProgramControl');
        /*Program management section end*/

        /*Assessment add section start*/
        Route::get('/assessment', 'AssessmentController@assessment');
        Route::post('/add-assessment', 'AssessmentController@addAssessment');
        Route::get('/assessmentResult', 'AssessmentController@assessmentResult');
        /*Assessment add section end*/

        Route::post('ProgramTemplatePdf','ProgramTeplatePdfController@ProgramTemplatePdf');
    });
    /*end auth routes*/
});
