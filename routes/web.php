<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/servein', 'Main\Main@servein');
Route::get('/about', 'Main\Main@about');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{provider}', 'Auth\AuthController@redirect');
    Route::get('/callback/{provider}', 'Auth\AuthController@callback');
    
});

Auth::routes();

Route::get('/logout',function(){
    Auth::logout();
    return redirect()->back();
});

// Route::get('/servein', 'Main\Contacts@create');
// Route::post('/servein', 'Main\Contacts@store');