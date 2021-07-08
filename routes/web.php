<?php

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
Route::view('/', 'welcome');
Route::get('admin','Admin\LoginController@index')->name('login.index');
Route::post('admin','Admin\LoginController@loginAdmin')->name('admin.login.post');
Route::get('admin/logout','Admin\LoginController@logout')->name('admin.logout.index');

/*Password reset section start*/
Route::get('resetpassword','ResetPasswordController@index')->name('resetpassword.index');
Route::post('resetpassword','ResetPasswordController@reset')->name('resetpassword.reset');
Route::get('success','ResetPasswordController@success')->name('resetpassword.success');
/*Password reset section end*/

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware' => 'admin'],function(){

	Route::get('dashboard','DashboardController@index')->name('admin.dashboard.index');
	Route::get('password','PasswordController@index')->name('admin.password.index');
	Route::get('password/store','PasswordController@store')->name('admin.password.store');

	/*category section start*/
	Route::resource('category','CategoryController');
	Route::get('category/changeStaus/{id}','CategoryController@status')->name('category.status');
	Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');
	Route::get('/category/catdelete/{id}','CategoryController@catdelete')->name('category.catdelete');
	/*end category section*/

	/*cms section start*/
	Route::resource('cms','CmsController');
	/*cms section end*/

	/*athlete profile section start*/
	Route::get('athlete','AthleteProfileController@index')->name('athlete.index');
	Route::get('athlete/edit/{id}','AthleteProfileController@edit')->name('athlete.edit');
	Route::put('athlete/update/{id}','AthleteProfileController@update')->name('athlete.update');
	/*athlete profile section end*/

	/*trainingage section start*/
	Route::get('trainingage','TrainingAgeController@index')->name('trainingage.index');
	Route::get('trainingage/edit/{id}','TrainingAgeController@edit')->name('trainingage.edit');
	Route::put('trainingage/update/{id}','TrainingAgeController@update')->name('trainingage.update');
	/*trainingage section end*/

	/*sports section start*/
	Route::get('sport','SportsController@index')->name('sport.index');
	/*sports section end*/

	/*contact section start*/
	Route::get('contact','ContactController@index')->name('contact.index');
	/*contact section end*/

	/*Training section start*/
	Route::resource('training','TrainingController');
	/*Training section end*/

	/*admin Profile section start*/
	Route::get('profile/edit','ProfileController@edit')->name('admin.profile.edit');
	Route::post('profile/update','ProfileController@update')->name('profile.update');
	/*admin profile section end*/

	/*programtemplate section start*/
	Route::resource('programtemplate','ProgramTemplateController');
	Route::get('programtemplate/ajaxSubprogram/{id}','ProgramTemplateController@ajaxSubprogram')->name('programtemplate.ajaxSubprogram');
	Route::get('programtemplate/changeStaus/{id}','ProgramTemplateController@status')->name('programtemplate.status');
	Route::get('programtemplate/delete/{id}','ProgramTemplateController@destroy')->name('programtemplate.delete');
	Route::post('programtemplate/delete-all','ProgramTemplateController@destroyBulkData')->name('programtemplate.destroyBulkData');
	/*end programtemplate section*/

	/*assessment result section start*/
	Route::resource('assessmentResult','AssessmentResultController');
	Route::get('assessmentResult/changeStaus/{id}','AssessmentResultController@status')->name('assessmentResult.status');
	Route::get('assessmentResult/delete/{id}','AssessmentResultController@destroy')->name('assessmentResult.delete');
	Route::get('/assessmentResult/delete/{id}','AssessmentResultController@destroy')->name('assessmentResult.delete');
	/*end section*/

	/*assessment result section start*/
	Route::resource('assessmentCategory','AssessmentCategoryController');
	Route::get('assessmentCategory/delete/{id}','AssessmentCategoryController@destroy')->name('assessmentCategory.delete');
	/*end section*/

	/*Exercise section start*/
	Route::resource('exercise','ExerciseController');
	Route::get('exercise/ajaxSubcat/{id}','ExerciseController@ajaxSubcat')->name('exercise.ajaxSubcat');
	Route::get('exercise/changeStaus/{id}','ExerciseController@status')->name('exercise.status');
    Route::get('exercise/delete/{id}','ExerciseController@destroy')->name('exercise.delete');
    Route::post('exercise/delete-all','ExerciseController@destroyBulkData')->name('exercise.destroyBulkData');
	/*end exercise section*/

	/*User Management Start*/
	Route::resource('users','UserController');
	Route::get('users/changeStaus/{id}','UserController@status')->name('users.status');
	Route::get('users/delete/{id}','UserController@destroy')->name('users.delete');
	/*User Management End*/

	/*Plan Management Start*/
	Route::resource('plan','PlanManagementController');
	Route::get('plan/changeStaus/{id}','PlanManagementController@status')->name('plan.status');
	Route::get('plan/delete/{id}','PlanManagementController@destroy')->name('plan.delete');
	/*Plan Management End*/

	/*Block Focus start*/
	Route::get('blockfocus','BlockFocusController@index')->name('blockfocus.index');
	Route::get('blockfocus/edit/{id}','BlockFocusController@edit')->name('blockfocus.edit');
	Route::put('blockfocus/update/{id}','BlockFocusController@update')->name('blockfocus.update');
	Route::get('blockfocuscategory/index/{id}','BlockFocusCategoryController@index')->name('blockfocuscategory.index');
	Route::get('blockfocuscategory/create/{id}','BlockFocusCategoryController@create')->name('blockfocuscategory.create');
	Route::post('blockfocuscategory/store','BlockFocusCategoryController@store')->name('blockfocuscategory.store');
	Route::get('blockfocuscategory/edit/{id}','BlockFocusCategoryController@edit')->name('blockfocuscategory.edit');
	Route::put('blockfocuscategory/update/{id}','BlockFocusCategoryController@update')->name('blockfocuscategory.update');
	// Route::get('blockfocus/tempocreate','BlockFocusController@tempocreate')->name('blockfocus.tempocreate');
	// Route::post('blockfocus/tempostore','BlockFocusController@tempostore')->name('blockfocus.tempostore');
	// Route::get('blockfocus/tempolist/{id}','BlockFocusController@tempolist')->name('blockfocus.tempolist');
	// Route::get('blockfocus/tempoedit/{id}','BlockFocusController@tempoedit')->name('blockfocus.tempoedit');
	// Route::post('blockfocus/tempoupdate','BlockFocusController@tempoupdate')->name('blockfocus.tempoupdate');
	/*Block Focus end*/


	/*Program Management Start*/
	Route::resource('program','ProgramController');
	Route::get('program/delete/{id}','ProgramController@destroy')->name('program.delete');
	Route::get('program/ajaxChildgoal/{id}','ProgramController@ajaxChildgoal')->name('program.ajaxChildgoal');
	Route::get('program/ajaxChildgoaltemplate/{id}','ProgramController@ajaxChildgoaltemplate')->name('program.ajaxChildgoaltemplate');
	Route::get('program/ajaxChildtemplate/{id}','ProgramController@ajaxChildtemplate')->name('program.ajaxChildtemplate');
	Route::get('program/ajaxSubcat/{id}','ProgramController@ajaxSubcat')->name('program.ajaxSubcat');
	Route::post('program/delete-all','ProgramController@destroyBulkData')->name('program.destroyBulkData');
	Route::post('programupdate','ProgramController@programUpdate')->name('programUpdate');
	Route::get('getParentCategory','ProgramController@getParentCategory')->name('getParentCategory');
	Route::get('getParentsubCategory/{id}','ProgramController@getParentsubCategory')->name('getParentsubCategory');
	/*Program Management End*/

	/*Frontend Contact page Management Start*/
	Route::get('contactpage','FronendController@contactpage')->name('contactpage');
	Route::get('contactpage/edit/{id}','FronendController@edit')->name('contactpage.edit');
	Route::post('contactpage/update','FronendController@update')->name('contactpage.update');
    /*Frontend Contact page Management end*/

    /*Export Import section start*/
	Route::get('programtemplate/import/create','ExportImportController@createProgramTemplate')->name('exportImport.create.program_template');
	Route::post('programtemplate/import/upload','ExportImportController@importProgramTemplate')->name('exportImport.upload.program_template');
	
	Route::get('exercise/import/create','ExportImportController@createExercise')->name('exportImport.create.exercise');
	Route::post('exerciseimport/upload','ExportImportController@importExercise')->name('exportImport.upload.exercise');
	

	Route::get('import/ajaxChildgoal/{id}','ExportImportController@ajaxChildgoal')->name('exportImport.ajaxChildgoal');
	Route::get('import/ajaxChildgoaltemplate/{id}/{child_id?}','ExportImportController@ajaxChildgoaltemplate')->name('exportImport.ajaxChildgoaltemplate');
	Route::get('import/ajaxSubCategory/{id}','ExportImportController@ajaxSubCategory')->name('exportImport.ajaxSubCategory');
	Route::get('import/ajaxSubSubCategory/{id}','ExportImportController@ajaxSubSubCategory')->name('exportImport.ajaxSubSubCategory');
	
	Route::get('download/sample/program_template','ExportImportController@sampleExcelProgramTemplate')->name('exportImport.sampleExcel.program_template');
	Route::get('download/sample/exercise','ExportImportController@sampleExcelExercise')->name('exportImport.sampleExcel.exercise');
	/*end Export Import section*/
});
