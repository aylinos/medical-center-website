<?php

use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']],
 function() {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');
  Route::post('dashboard', 'DashboardController@addSpecialty')->name('addSpecialty');
  Route::delete('delete/{id}', 'DashboardController@delete')->name('delete');
  Route::get('makedoctor/{id}', 'DashboardController@makedoctor')->name('makedoctor');
  Route::delete('deleteuser/{id}', 'DashboardController@deleteuser')->name('deleteuser');
  // Route::get('addDoctor/{id}', 'DashboardController@addDoctor')->name('addDoctor');
  Route::post('createDoctor', 'DashboardController@createDoctor')->name('createDoctor');
});


Route::group(['as'=>'doctor.', 'prefix'=>'doctor', 'namespace'=>'Doctor', 'middleware'=>['auth', 'doctor']],
 function() {
  Route::get('myProfile', 'ProfileController@myProfile')->name('profile');
  Route::post('myProfile', 'ProfileController@updateProfile')->name('updateProfile');
});

Route::group(['as'=>'patient.', 'prefix'=>'patient', 'namespace'=>'Patient', 'middleware'=>['auth', 'patient']],
 function() {
  Route::get('home', 'PatientController@index')->name('home');
});

Route::get('/orthodontists', 'SpecialistsController@orthodontists')->name('orthodontists');

// Route::get('/myProfile', 'Doctor\ProfileController@myProfile');

Route::post('/updateImg', 'Doctor\ProfileController@update_profileImg');
