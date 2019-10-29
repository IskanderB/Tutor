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

Route::get('/', 'HomePageController@index')->name('/');

Route::get('/registration', 'RegistrationPageController@index')->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myaccount', 'UserAccountController@index')->middleware(['auth', 'confirmed']);

Route::get('user/{user}/verifycation', 'VerifycationPageController@index')->name('verifycation');

Route::get('users/{user}/confirmation/{token}', 'VerifycationPageController@confirm')->name('confirm-email');

Route::get('/RedirectRegister', 'RedirectRegisterController@redirecrRegister')->name('RedirectRegister');

Route::get('/verifycation', 'VerifycationPageController@redirectFromAccount')->name('redirectFromAccount');

Route::get('/fogotpassword', 'PasswordChangeEmailPageController@index')->name('fogotpassword');

Route::get('/myaccount/edit', 'EditUserDataPageController@index')->middleware(['auth', 'confirmed'])->name('editDataUser');

Route::post('user/{user}/edit', 'EditUserDataController@upDate')->name('edit');

Route::get('/send-message', 'ChatController@sendMessage')->name('send-message');

Route::get('/myaccount/tutorchatroom/{studid}', 'TutorChatController@redirect')->name('tutorchatroom');

Route::get('/tutoraccount', 'UserAccountController@studList')->name('tutoraccount')->middleware(['auth', 'confirmed']);;


// Route::post('messages', function(Illuminate\Http\Request $request){
//   App\Events\Message::dispatch($request->input('body'))
// });
