<?php

use Dingo\Api\Routing\Router;
use App\Helpers\ApiResponse;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {

    $api->group(['prefix' => 'auth', 'middleware' => 'cors'], function(Router $api) {

        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return ApiResponse::response(200,'Ok',
                ['message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.']);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return ApiResponse::response(200, 'Ok',
                    ['message' => 'By accessing this endpoint, you can refresh your access token at each request. 
                        Check out this response headers!']);
            }
        ]);
    });

    $api->get('hello', [
        'middleware' => 'cors', 
        function() {
            return ApiResponse::response(200, 'Ok',
                ['message' => 'This is a simple example of item returned by your APIs. Everyone can see it.']);
        }
    ]);

    $api->get('drinkList', 'App\\Api\\V1\\Controllers\\ListController@list')->middleware('cors');
    $api->get('consumedDrinks', 'App\\Api\\V1\\Controllers\\ConsumedDrinkController@list')->middleware('cors');
    $api->post('consumedDrink', 'App\\Api\\V1\\Controllers\\ConsumedDrinkController@addToList')->middleware('cors');
});
