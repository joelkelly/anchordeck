<?php

/*
|--------------------------------------------------------------------------
| View Composers
|--------------------------------------------------------------------------
|
|
|
*/


# Login Status in Header
View::composer('_layouts.shared.header', function($view)
{
    $view->with('user', Sentry::getUser());
});

# Login Status in Header Ommited
View::composer(array('site/account/login','site/account/register', 'site/account/register-thanks'), function($view)
{
    $view->with('hideprofile', true);
});


/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

# Login
Route::get('account/login', 'AuthController@getLogin');
Route::post('account/login', 'AuthController@postLogin');

# Register
Route::get('account/register', 'AuthController@getRegister');
Route::post('account/register', 'AuthController@postRegister');

# Account Activation
Route::get('account/activate/{userID}/{activationCode}', 'AuthController@getActivate');

# Forgot Password
Route::get('account/forgot-password', 'AuthController@getForgotPassword');
Route::post('account/forgot-password', 'AuthController@postForgotPassword');

# Forgot Password Confirmation
Route::get('account/forgot-password/{userID}/{resetCode}', 'AuthController@getForgotPasswordConfirmation');
Route::post('account/forgot-password/{userID}/{resetCode}', 'AuthController@postForgotPasswordConfirmation');

# Logout
Route::get('account/logout', 'AuthController@getLogout');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::get('/',     array('as' => 'home', 'uses' => 'HomeController@showWelcome'));


/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

# Settings
Route::get('account/settings', 'AccountSettingsController@getIndex');
Route::post('account/settings', 'AccountSettingsController@postIndex');

# Dashboard
Route::get('account', 'AccountController@getIndex');

