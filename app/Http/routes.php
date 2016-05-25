<?php
use Illuminate\Http\Request;

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

$app->post('/categories',        [ 'as' => 'categories', 'uses' => 'HomeController@getCategories'    ]);
$app->get('/categories',         [ 'as' => 'categories', 'uses' => 'HomeController@getCategories'    ]);
$app->post('/services',          [ 'as' => 'services',   'uses' => 'HomeController@getServices'      ]);
$app->get('/services',           [ 'as' => 'services',   'uses' => 'HomeController@getServices'      ]);
$app->get('/services/find/{id}', [ 'as' => 'getservices','uses' => 'HomeController@getService'       ]);

$app->get('/auth/',             [ 'as' => 'auth.index',               'uses' => 'AuthController@index' ]);
$app->post('/auth/login',       [ 'as' => 'auth.login',               'uses' => 'AuthController@login' ]);
$app->get('/auth/logout',       [ 'as' => 'auth.logout',              'uses' => 'AuthController@logout']);



$app->group(['namespace' => 'App\Http\Controllers\Admin','prefix' =>'admin' ,'middleware' => 'auth'], function ($app) {


    $app->get('/', function () {
        return view('admin.index');
    });

    $app->get('user',                   [ 'as' => 'user.index',               'uses' => 'UserController@index']);
    $app->get('user/register',          [ 'as' => 'user.register',            'uses' => 'UserController@register']);
    $app->post('user/store',            [ 'as' => 'user.store',               'uses' => 'UserController@store']);
    $app->get('user/{id}/edit',         [ 'as' => 'user.edit',                'uses' => 'UserController@edit']);
    $app->post('user/{id}/update',      [ 'as' => 'user.update',              'uses' => 'UserController@update']);
    $app->get('user/{id}/delete',       [ 'as' => 'user.delete',              'uses' => 'UserController@delete']);

    $app->get('category/',              [ 'as' => 'category.index',           'uses' => 'CategoryController@index'        ]);
    $app->get('category/create',        [ 'as' => 'category.create',          'uses' => 'CategoryController@create'       ]);
    $app->post('category/store',        [ 'as' => 'category.store',           'uses' => 'CategoryController@store'        ]);
    $app->get('category/show',          [ 'as' => 'category.show',            'uses' => 'CategoryController@show'         ]);
    $app->get('category/{id}/edit',     [ 'as' => 'category.edit',            'uses' => 'CategoryController@edit'         ]);
    $app->post('category/{id}/update',  [ 'as' => 'category.update',          'uses' => 'CategoryController@update'       ]);
    $app->get('category/{id}/delete',   [ 'as' => 'category.delete',          'uses' => 'CategoryController@delete'       ]);
    $app->get('category/{id}/active',   [ 'as' => 'category.active',          'uses' => 'CategoryController@active'       ]);

    $app->get('service/',               [ 'as' => 'service.index',            'uses' => 'ServiceController@index'         ]);
    $app->get('service/create/{id}',    [ 'as' => 'service.create',           'uses' => 'ServiceController@create'        ]);
    $app->post('service/store',         [ 'as' => 'service.store',            'uses' => 'ServiceController@store'         ]);
    $app->get('service/show',           [ 'as' => 'service.show',             'uses' => 'ServiceController@show'          ]);
    $app->get('service/{id}/edit',      [ 'as' => 'service.edit',             'uses' => 'ServiceController@edit'          ]);
    $app->post('service/{id}/update',   [ 'as' => 'service.update',           'uses' => 'ServiceController@update'        ]);
    $app->get('service/{id}/delete',    [ 'as' => 'service.delete',           'uses' => 'ServiceController@delete'        ]);
    $app->post('service/search',        [ 'as' => 'service.search',           'uses' => 'ServiceController@search'        ]);


    $app->post('command/store',         [ 'as' => 'command.store',            'uses' => 'CommandController@store'       ]);
    $app->get('command/create/{id}',    [ 'as' => 'command.create',           'uses' => 'CommandController@create'      ]);
    $app->get('command/show/{id}',      [ 'as' => 'command.show',             'uses' => 'CommandController@show'        ]);
    $app->get('command/{id}/edit',      [ 'as' => 'command.edit',             'uses' => 'CommandController@edit'        ]);
    $app->post('command/{id}/update',   [ 'as' => 'command.update',           'uses' => 'CommandController@update'      ]);
    $app->get('command/{id}/delete',    [ 'as' => 'command.delete',           'uses' => 'CommandController@delete'      ]);
    $app->get('command/exec/{id}',      [ 'as' => 'command.exec',             'uses' => 'CommandController@exec'        ]);
    $app->post('command/upload',        [ 'as' => 'command.upload',           'uses' => 'CommandController@upload'      ]);
    $app->get('command/file/{id}',      [ 'as' => 'command.file',             'uses' => 'CommandController@file'        ]);

    $app->get('task/create/{id}',       [ 'as' => 'task.create',              'uses' => 'TaskController@create'      ]);
    $app->post('task/store',            [ 'as' => 'task.store',               'uses' => 'TaskController@store'       ]);
    $app->get('task/show/{id}',         [ 'as' => 'task.show',                'uses' => 'TaskController@show'        ]);
    $app->get('task/{id}/edit',         [ 'as' => 'task.edit',                'uses' => 'TaskController@edit'        ]);
    $app->post('task/{id}/update',      [ 'as' => 'task.update',              'uses' => 'TaskController@update'      ]);
    $app->get('task/{id}/delete',       [ 'as' => 'task.delete',               'uses' => 'TaskController@delete'      ]);

    $app->get('logs/',                  [ 'as' => 'log.index',               'uses' => 'LogController@index'      ]);

});

$app->get('/{slug}',       [ 'as' => 'home',       'uses' => 'HomeController@Slug'             ]);
$app->get('/',             [ 'as' => 'home',       'uses' => 'HomeController@index'            ]);
$app->get('/helper', function(){
    return view('helper');
});









