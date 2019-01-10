<?php
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'subscription.active']], function () {
  Route::get('/dashboard', 'DashboardController@index');
});
/**
* Account
*/
Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.', 'namespace' => 'Account'], function () {
  Route::get('/', 'AccountController@index')->name('index');
  /**
* Profile
  */
  Route::get('/profile', 'ProfileController@index')->name('profile.index');
  Route::post('/profile', 'ProfileController@store')->name('profile.update');
  /**
*Password
  */
  Route::get('/password', 'PasswordController@index')->name('password.index');
  Route::post('/password', 'PasswordController@store')->name('password.store');
  /**
  *Subscription
  */
  Route::group(['prefix' => 'subscription', 'namespace' => 'Subscription'], function () {
    /**
    *Cancel
    */
    Route::group(['middleware' => 'subscription.notcancelled'], function () {
      Route::get('/cancel', 'SubscriptionCancelController@index')->name('subscription.cancel.index');
      Route::post('/cancel', 'SubscriptionCancelController@store')->name('subscription.cancel.store');
    });
    /**
    *resume*/
    Route::group(['middleware' => 'subscription.cancelled'], function () {
      Route::get('/resume', 'SubscriptionResumeController@index')->name('subscription.resume.index');
      Route::post('/resume', 'SubscriptionResumeController@store')->name('subscription.resume.store');
    });
    /**
    *Swap
    */
    Route::group(['middleware' => 'subscription.notcancelled'], function () {
      Route::get('/swap', 'SubscriptionSwapController@index')->name('subscription.swap.index');
    });


  });
  /**
  *card
  */
  Route::group(['prefix' => 'card', 'namespace' => 'Card', 'middleware' => 'subscription.customer'], function () {
    Route::get('/', 'UpdateCardController@index')->name('updatecard.index');
    Route::post('/card', 'UpdateCardController@store')->name('updatecard.store');
  });
});
/**
* Account activation
*/
Route::group(['prefix' => 'activation',  'as' => 'activation.', 'middleware' => ['guest']], function () {
  Route::get('/resend', 'Auth\ActivationResendController@index')->name('resend');
  Route::post('/resend', 'Auth\ActivationResendController@store')->name('resend.store');
  Route::get('/{confirmation_token}', 'Auth\ActivationController@activate')->name('activate');
});
/**
*Subscription Plans
*/
Route::group(['prefix' => 'plans', 'as' => 'plans.', 'middleware' => 'subscription.inactive'], function () {
  Route::get('/', 'Subscription\PlanController@index')->name('index');
  Route::get('/teams', 'Subscription\PlanTeamController@index')->name('teams.index');
});
/**
*SubScription
*/
Route::group(['prefix' => 'subscription', 'as' => 'subscription.', 'middleware' => ['auth.register', 'subscription.inactive'] ], function () {
  Route::get('/', 'Subscription\SubscriptionController@index')->name('index');
  Route::post('/', 'Subscription\SubscriptionController@store')->name('store');
});
