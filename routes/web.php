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

/** LOGIN **/

Route::post('login', function(){
	return response()->file(storage_path("json/login.json"));
});

/** conciliador rotas */
Route::get('transactionconciliations', 'TransactionConciliationsController@response');
Route::get('transactionsummaries', 'TransactionSummariesController@response');
Route::get('movementsummaries', 'MovementSummariesController@response');
Route::get('financials', 'FinancialsController@response');
Route::get('adjustsummaries', 'AdjustSummariesController@response');
Route::get('adjusts', 'AdjustsController@response');

/** mobile rede rotas */
Route::post('Autenticacao/GerenciarLogOn','GerenciarLogOn@response');
Route::post('Autenticacao/ObterVersaoMinima','ObterVersaoMinima@response');
Route::post('Autenticacao/Inicializacao','Inicializacao@response');
Route::post('Autenticacao/AssociarTerminal','AssociarTerminal@response');
Route::post('Autenticacao/FinalizarSessao','FinalizarSessao@response');

Route::get('Autenticacao/BaixarInicializacao', function()
{
    $file = storage_path(). '/mobred/LOJISTA_14.TBL';
    return Response::download($file, 'LOJISTA_14.TBL', ['content-type' => 'text/cvs']);
});

Route::post('Transacao/EnviarTransacao','EnviarTransacao@response');
