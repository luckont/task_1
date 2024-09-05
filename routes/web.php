<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "posts"], function () use ($router) {

    $router->get('/', "PostsController@getAllPosts");

    $router->get('/{id}', "PostsController@getOnePosts");

    $router->post('/', "PostsController@createPosts");

    $router->put("/{id}", "PostsController@updatePosts");

    $router->post("/{id}/like", "LikesController@likePosts");

    $router->delete("/{id}/unlike", "LikesController@unlikePosts");
});
// ex2222
