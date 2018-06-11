<?php

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

/** mobile rede rotas */

// android

Route::group(['prefix' => 'Autenticacao', 'as' => 'Autenticacao'], function () {
  Route::post('/GerenciarLogOn','GerenciarLogOn@response');
  Route::post('/ObterVersaoMinima','ObterVersaoMinima@response');
  Route::post('/Inicializacao','Inicializacao@response');
  Route::post('/AssociarTerminal','AssociarTerminal@response');
  Route::post('/FinalizarSessao','FinalizarSessao@response');
});
Route::group(['prefix' => 'Transacao', 'as' => 'Transacao'], function () {
  Route::post('/EnviarTransacao','EnviarTransacao@response');
});
Route::group(['prefix' => 'Comprovante', 'as' => 'Comprovante'], function () {
  Route::post('/EnviarComprovante','EnviarComprovante@response');
  Route::post('/EnviarComprovante','EnviarComprovante@response');
});
Route::group(['prefix' => 'ConsultarTransacao', 'as' => 'Comprovante'], function () {
  Route::post('/ConsultarTransacao','ConsultarTransacao@response');
  Route::post('/DetalharTransacao','DetalharTransacao@response');
});
Route::get('Autenticacao/BaixarInicializacao', function()
{
    $file = storage_path(). '/mobred/LOJISTA_14.TBL';
    return Response::download($file, 'LOJISTA_14.TBL', ['content-type' => 'text/cvs']);
});

// ios
Route::group(['prefix' => 'get/Autenticacao', 'as' => 'get/Autenticacao'], function () {
  Route::get('/GerenciarLogOn','GerenciarLogOn@response');
  Route::get('/ObterVersaoMinima','ObterVersaoMinima@response');
  Route::get('/Inicializacao','Inicializacao@response');
  Route::get('/AssociarTerminal','AssociarTerminal@response');
  Route::get('/FinalizarSessao','FinalizarSessao@response');
});
Route::group(['prefix' => 'get/Transacao', 'as' => 'get/Transacao'], function () {
  Route::post('/EnviarTransacao','EnviarTransacao@response');
});
Route::group(['prefix' => 'get/Comprovante', 'as' => 'get/Comprovante'], function () {
  Route::get('/EnviarComprovante','EnviarComprovante@response');
  Route::get('/EnviarComprovante','EnviarComprovante@response');
});
Route::group(['prefix' => 'get/ConsultarTransacao', 'as' => 'get/ConsultarTransacao'], function () {
  Route::get('/ConsultarTransacao','ConsultarTransacao@response');
  Route::get('/DetalharTransacao','DetalharTransacao@response');
});
Route::get('get/Autenticacao/BaixarInicializacao', function()
{
    $file = storage_path(). '/mobred/LOJISTA_14.TBL';
    return Response::download($file, 'LOJISTA_14.TBL', ['content-type' => 'text/cvs']);
});



/** conciliador rotas */

Route::post('login', function(){
	return response()->file(storage_path("json/login.json"));
});

Route::get('transactionconciliations', 'TransactionConciliationsController@response');
Route::get('transactionsummaries', 'TransactionSummariesController@response');
Route::get('movementsummaries', 'MovementSummariesController@response');
Route::get('financials', 'FinancialsController@response');
Route::get('adjustsummaries', 'AdjustSummariesController@response');
Route::get('adjusts', 'AdjustsController@response');
