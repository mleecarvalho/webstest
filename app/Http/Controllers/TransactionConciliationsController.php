<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TransactionConciliationsController extends Controller{
	
	public function response(Request $request){
		$dashboard = 'json/dashboard';
		$response = "";
		if(isset($request->groupBy) and $request->groupBy != null) // calendario listagem
			$response = $dashboard."/calendario.json";
		else // calendario totais
			$response = $dashboard."/calendario_totais.json";
		return response()->file(storage_path($response));
	}
}