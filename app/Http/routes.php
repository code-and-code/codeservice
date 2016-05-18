<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/', [ 'as' => 'home', 'uses' => 'HomeController@index']);


$app->group(['namespace' => 'App\Http\Controllers\Admin','prefix' =>'admin'], function ($app) {

    $app->get('category/',              [ 'as' => 'category.index',         'uses' => 'CategoryController@index'        ]);
    $app->get('category/create',        [ 'as' => 'category.create',        'uses' => 'CategoryController@create'       ]);
    $app->post('category/store',        [ 'as' => 'category.store',         'uses' => 'CategoryController@store'        ]);
    $app->get('category/show',          [ 'as' => 'category.show',          'uses' => 'CategoryController@show'         ]);
    $app->get('category/{id}/edit',     [ 'as' => 'category.edit',          'uses' => 'CategoryController@edit'         ]);
    $app->post('category/{id}/update',  [ 'as' => 'category.update',        'uses' => 'CategoryController@update'       ]);
    $app->get('category/{id}/delete',   [ 'as' => 'category.delete',        'uses' => 'CategoryController@delete'       ]);
    $app->post('category/search',       [ 'as' => 'category.search',        'uses' => 'CategoryController@search'       ]);
    $app->get('category/{id}/active',   [ 'as' => 'category.active',        'uses' => 'CategoryController@active'       ]);
    $app->get('category/{id}/display',  [ 'as' => 'category.display',        'uses' => 'CategoryController@display'     ]);


    $app->post('command/store',         [ 'as' => 'command.store',            'uses' => 'CommandController@store'       ]);
    $app->get('command/create/{id}',    [ 'as' => 'command.create',           'uses' => 'CommandController@create'      ]);
    $app->get('command/show/{id}',      [ 'as' => 'command.show',             'uses' => 'CommandController@show'        ]);
    $app->get('command/{id}/edit',      [ 'as' => 'command.edit',             'uses' => 'CommandController@edit'        ]);
    $app->post('command/{id}/update',   [ 'as' => 'command.update',           'uses' => 'CommandController@update'      ]);
    $app->get('command/{id}/delete',    [ 'as' => 'command.delete',           'uses' => 'CommandController@delete'      ]);
    $app->get('command/exec/{id}',      [ 'as' => 'command.exec',             'uses' => 'CommandController@exec'      ]);


});

$app->group(['namespace' => 'App\Http\Controllers\User', 'prefix' => 'user'], function ($app)
{
    $app->get('user/',                  [ 'as' => 'user.index',               'uses' => 'UserController@index'          ]);
    $app->get('user/create',            [ 'as' => 'user.create',              'uses' => 'UserController@create'         ]);
    $app->get('user/store',             [ 'as' => 'user.store',               'uses' => 'UserController@store'          ]);
    $app->get('user/show/{id}',         [ 'as' => 'user.show',                'uses' => 'UserController@show'           ]);
    $app->get('user/{id}/edit',         [ 'as' => 'user.edit',                'uses' => 'UserController@edit'           ]);
});
