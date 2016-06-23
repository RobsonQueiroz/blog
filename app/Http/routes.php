<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses'=>'PostController@index', 'as'=>'inicio']);
Route::get('/post/{id}', ['uses'=>'PostController@postUnico', 'as'=>'post.unico']);
Route::get('/autor/{id}', ['uses'=>'PostController@postAutor', 'as'=>'post.autor']);
//Route::get('auth/logout', 'Auth\AuthController@logout');

	
Route::auth();

Route::get('/home', 'PostController@index');


Route::get('/post',['uses'=>'PostController@index', 'as'=>'post.index']);

Route::group(['middleware' => 'auth'], function () 
{
	Route::get('/usuario', ['uses'=>'UsuarioController@index','as'=>'usuario.index']);
	Route::get('/usuario/adicionar', ['uses'=>'UsuarioController@adicionar','as'=>'usuario.adicionar']);
	Route::post('/usuario/salvar', ['uses'=>'UsuarioController@salvar','as'=>'usuario.salvar']);
	Route::get('/usuario/editar/{id}', ['uses'=>'UsuarioController@editar','as'=>'usuario.editar']);
	Route::put('/usuario/atualizar/{id}', ['uses'=>'UsuarioController@atualizar','as'=>'usuario.atualizar']);
	Route::get('/usuario/deletar/{id}', ['uses'=>'UsuarioController@deletar','as'=>'usuario.deletar']);

	Route::get('usuario/detalhe/{id}',['uses'=>'UsuarioController@detalhe','as'=>'usuario.detalhe']);

	Route::get('post/adicionar/{id}',['uses'=>'PostController@adicionar','as'=>'post.adicionar']);
	Route::post('post/salvar/{id}',['uses'=>'PostController@salvar','as'=>'post.salvar']);

	
	Route::get('/post/editar/{id}', ['uses'=>'PostController@editar','as'=>'post.editar']);
	Route::put('/post/atualizar/{id}', ['uses'=>'PostController@atualizar','as'=>'post.atualizar']);
	Route::get('/post/deletar/{id}', ['uses'=>'PostController@deletar','as'=>'post.deletar']);
});

