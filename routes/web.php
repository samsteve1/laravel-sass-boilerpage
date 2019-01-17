<?php
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'subscription.active']], function () {
  Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

/**
*Auth Login
*/
Route::group(['middleware' => 'guest'], function () {
  Route::get('/login/twofactor', 'Auth\TwoFactorLoginController@index')->name('login.twofactor.index');
  Route::post('/login/twofactor', 'Auth\TwoFactorLoginController@verify')->name('login.twofactor.verify');
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
  *Deactivate
  */

  Route::get('/deactivate', 'DeactivateController@index')->name('deactivate.index');
  Route::post('/deactivate', 'DeactivateController@store')->name('deactivate.store');
  /**
  *Subscription
  */
  Route::group(['prefix' => 'subscription', 'namespace' => 'Subscription', 'middleware' => ['subscription.owner']], function () {
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
      Route::post('/swap', 'SubscriptionSwapController@store')->name('subscription.swap.store');
    });
    /**
    *Team SubScription
    **/
    Route::group(['prefix' => 'team', 'middleware' => ['subscription.team']], function () {
      Route::get('/', 'SubscriptionTeamController@index')->name('subscription.team.index');
      Route::patch('/', 'SubscriptionTeamController@update')->name('subscription.team.update');
      Route::post('/member', 'SubscriptionTeamMemberController@store')->name('subscription.team.member.store');
      Route::delete('/member/{user}', 'SubscriptionTeamMemberController@destroy')->name('subscription.team.member.destroy');
    });

  });
  /**
  *card
  */
  Route::group(['prefix' => 'card', 'namespace' => 'Card', 'middleware' => 'subscription.customer'], function () {
    Route::get('/', 'UpdateCardController@index')->name('updatecard.index');
    Route::post('/card', 'UpdateCardController@store')->name('updatecard.store');
  });
  /**
  *TwoFactor Auth
  */
  Route::group([], function () {
    Route::get('/twofactor', 'TwoFactorController@index')->name('twofactor.index');
    Route::post('/twofactor', 'TwoFactorController@store')->name('twofactor.store');
    Route::post('/twofactor/verify', 'TwoFactorController@verify')->name('twofactor.verify');
    Route::delete('/twofactor', 'TwoFactorController@destroy')->name('twofactor.destroy');
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
