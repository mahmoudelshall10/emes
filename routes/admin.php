<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
		return 'admin';
	});

\L::Panel(app('admin'));/// Set Lang redirect to admin
\L::LangNonymous();// Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {

		Route::get('theme/{id}', 'Admin\Dashboard@theme');
		Route::group(['middleware' => 'admin_guest'], function () {

				Route::get('login', 'Admin\AdminAuthenticated@login_page');
				Route::post('login', 'Admin\AdminAuthenticated@login_post');

				Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
				Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
				Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
			});
		/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

		Route::group(['middleware' => 'admin:admin'], function () {
				//////// Admin Routes /* Start */ //////////////
				Route::get('/', 'Admin\Dashboard@home');
				Route::any('logout', 'Admin\AdminAuthenticated@logout');

				Route::get('account', 'Admin\AdminAuthenticated@account');
				Route::post('account', 'Admin\AdminAuthenticated@account_post');
				Route::resource('settings', 'Admin\Settings');

				Route::resource('contacts','Admin\Contacts'); 
Route::post('contacts/multi_delete','Admin\Contacts@multi_delete'); 
				Route::resource('sliders','Admin\Sliders'); 
Route::post('sliders/multi_delete','Admin\Sliders@multi_delete'); 
				Route::resource('cards','Admin\Cards'); 
Route::post('cards/multi_delete','Admin\Cards@multi_delete'); 

				Route::resource('pages','Admin\Pages'); 
Route::post('pages/multi_delete','Admin\Pages@multi_delete'); 
				Route::resource('countries','Admin\Countries'); 
Route::post('countries/multi_delete','Admin\Countries@multi_delete'); 
				Route::resource('serveins','Admin\Serveins'); 
Route::post('serveins/multi_delete','Admin\Serveins@multi_delete'); 

Route::resource('users','Admin\Users'); 
Route::post('users/multi_delete','Admin\Users@multi_delete'); 
Route::get('users/activate/{token}', 'Admin\Users@signupActivate');
				Route::resource('downloadfiles','Admin\DownloadFiles'); 
Route::post('downloadfiles/multi_delete','Admin\DownloadFiles@multi_delete'); 
				Route::resource('socials','Admin\Socials'); 
Route::post('socials/multi_delete','Admin\Socials@multi_delete'); 
				Route::resource('serviceforms','Admin\ServiceForms'); 
Route::post('serviceforms/multi_delete','Admin\ServiceForms@multi_delete'); 
				Route::resource('careers','Admin\Careers'); 
Route::post('careers/multi_delete','Admin\Careers@multi_delete'); 
				Route::resource('teams','Admin\Teams'); 
Route::post('teams/multi_delete','Admin\Teams@multi_delete'); 
				//////// Admin Routes /* End */ //////////////
			});

	});
