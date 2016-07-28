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

Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

Route::group(['prefix'=>'auth'], function() {

    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

});

Route::group(['prefix'=>'', 'middleware'=>'auth'], function(){

    Route::get('/', ['as' => 'home', 'uses' => function () {

        $dados = [
            'cnpj' => "",
            'ie' => "",
            'rsocial' => "",
            'logradouro' => "",
            'numero' => "",
            'complemento' => "",
            'bairro' => "",
            'municipio' => "",
            'uf' => "",
            'cep' => "",
            'telefone' => "",
            'atividadeEco' => "",
            'dtinicio' => "",
            'situacao' => "",
            'dtsituacao' => "",

        ];

        $dados = json_encode($dados);

        $dados = json_decode($dados);

        return view('home', compact('dados'));
    }]);

    Route::post('pesquisar', ['as' => 'pesquisar', 'uses' => 'ApiController@pesquisar']);
    Route::get('consultar', ['as' => 'consultar', 'uses' => 'ApiController@consultar']);
    Route::get('consultar/remover/{id}', ['as' => 'consultar.remover', 'uses' => 'ApiController@remover']);
});
