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

Route::get('/', 'HomePageController@index');

Route::get('/registration', 'RegistrationPageController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myaccount', 'UserAccountController@index')->middleware(['auth', 'confirmed']);

Route::get('user/{user}/verifycation', 'VerifycationPageController@index')->name('verifycation');

Route::get('users/{user}/confirmation/{token}', 'VerifycationPageController@confirm')->name('confirm-email');

Route::get('/RedirectRegister', 'RedirectRegisterController@redirecrRegister')->name('RedirectRegister');
