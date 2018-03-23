<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MovementSummariesController extends Controller{

	
	public function response(Request $request){
		$dashboard = 'json/dashboard';
		$financial = 'json/financials';
		$response = "";
		if(isset($request->status) and $request->status == "EXPECTED") // financials
				$response = $financial."/movementsummaries_EXPECTED.json";
		else if(isset($request->status) and $request->status == "FORETHOUGHT,RECEIVED") // dashboard totais recebidos
			if($this->isGettingLastMonth($request->endDate)) // mes anterior
				$response = $dashboard."/calendario_movement_summaries.json";
			else // mes atual
				$response = $dashboard."/calendario_movement_summaries_last_month.json";
		return response()->file(storage_path($response));
	}

	public function isGettingLastMonth($date){
		 $settedMonth = intval(substr($date, 4,2));
		 $actualMonth = intval(date('n', strtotime('-1 month')));
		 $lastMonth = ($actualMonth > 0) ? $actualMonth - 1 : 0;
		return ($settedMonth == $lastMonth);
	}

}
