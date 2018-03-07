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

// Auth routes
Auth::routes();
Route::group(['prefix' => 'instructor'], function () {
    Route::get('/login', 'Auth\Instructor\LoginController@showLoginForm')->name('instructor.login');
    Route::post('/login', 'Auth\Instructor\LoginController@login')->name('instructor.login.submit');
    Route::get('/logout', 'Auth\Instructor\LoginController@logout')->name('instructor.logout');
    Route::get('/dashboard', 'Instructor\InstructorController@index')->name('instructor.dashboard');

    Route::post('/password/email', 'Auth\Instructor\ForgotPasswordController@sendResetLinkEmail')->name('instructor.password.email');
    Route::get('/password/reset', 'Auth\Instructor\ForgotPasswordController@showLinkRequestForm')->name('instructor.password.request');
    Route::post('/password/reset', 'Auth\Instructor\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\Instructor\ResetPasswordController@showResetForm')->name('instructor.password.reset');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::get('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
    Route::post('/login', 'Auth\Admin\LoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');

    Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
});

// Athlete routes
Route::get('/{url?}', 'AthleteController@index')->where('url', 'dashboard')->name('dashboard');
Route::get('/my-workout', 'AthleteWorkoutController@index')->name('workout');
Route::get('/my-workout-history', 'AthleteWorkoutController@viewHistory')->name('workout.history');
Route::get('/body-measurements', 'AthleteBodyMeasurementsController@index')->name('bodymeasurements');
Route::get('/getMeasurements/{athleteId}/{measure?}', 'AthleteBodyMeasurementsController@getMeasurements')->name('bodymeasurements.get');
Route::get('/progress/{exercise}', 'ExerciseProgressController@show')->name('progress.show');
Route::post('/progress/{exercise}', 'ExerciseProgressController@store')->name('progress.store');

// Instructor routes
Route::get('instructor/dashboard', 'InstructorController@index')->name('instructor.dashboard');
Route::resource('workouts', 'Instructor\WorkoutsController');
Route::resource('exercises', 'Instructor\ExercisesController');
Route::resource('exercise-techniques', 'Instructor\ExerciseTechniquesController');
Route::resource('workout-types', 'Instructor\WorkoutTypesController');
Route::resource('instructor.athletes', 'Instructor\AthletesController');
Route::resource('athletes.measurements', 'Instructor\BodyMeasurementsController')->only(['store']);

// Admin routes
Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');
Route::resource('athletes', 'Admin\AthletesController');
Route::resource('instructors', 'Admin\InstructorsController');
Route::resource('memberships', 'Admin\MembershipsController')->except(['show', 'edit', 'update']);
Route::resource('membership-types', 'Admin\MembershipTypesController');
Route::get('memberships-report', 'Admin\MembershipsController@viewReport')->name('memberships.report.view');
Route::get('memberships/{timeRange?}', 'Admin\MembershipsController@getReport')->name('memberships.report.get');