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

Route::get('/', function () {
    return view('welcome');
});

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


//// Athlete routes
Route::get('/dashboard', 'AthleteController@index')->name('dashboard');
//Route::get('/dashboard', 'ProfileController@index');
//Route::get('/my-workout', 'ProfileController@viewWorkout');
//Route::get('/my-workout-history', 'AthleteWorkoutController@viewWorkoutHistory');
//Route::get('/body-measurements', 'AthleteWorkoutController@viewBodyMeasurements');
//Route::get('/progress/{exercise?}', 'ExerciseProgressController@show');
//Route::post('/progress/{exercise?}', 'ExerciseProgressController@store');
//
//// Instructor routes
//Route::resource('workout', 'WorkoutsController');
//Route::resource('exercise', 'ExercisesController');
//Route::resource('exercise-technique', 'ExerciseTechniquesController');
//Route::resource('workout-type', 'WorkoutTypesController');
//Route::resource('athletes', 'AthletesController');
//Route::resource('athletes.body-measurement', 'BodyMeasurementsController');
//
//// Admin routes
//Route::resource('instructor', 'InstructorsController');
//Route::resource('membership-types', 'MembershipsController');
//Route::get('memberships/{timeRange?}', 'MembershipsController@viewReport');