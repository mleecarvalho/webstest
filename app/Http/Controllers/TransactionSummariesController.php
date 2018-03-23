<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TransactionSummariesController extends Controller{
	
	public function response(Request $request){
		$dashboard = 'json/dashboard';
		$sales = 'json/sales';
		$reports = 'json/reports';
		$endDate = (isset($request->endDate)) ? $request->endDate : 1;
		$startDate = (isset($request->startDate)) ? $request->startDate : 2;
		$response = "";
		if($endDate == $startDate) {	
			if(isset($request->groupBy) and $request->groupBy == 'CARD_PRODUCT,CONCILIATION_STATUS,ACQUIRER')
				$response = $sales."/transactionsummaries_".$request->conciliationStatus."_itens.json";
			else if(isset($request->conciliationStatus))	
				$response = $sales."/transactionsummaries_".$request->conciliationStatus."_totais.json";
			else $response = $dashboard."/calendario_transactionsummaries.json";
		}else if(isset($request->groupBy) and isset($request->conciliationStatus) and $request->groupBy == "CARD_PRODUCT" and $request->conciliationStatus == "TO_CONCILIE,CONCILIED" ){
			$response = $reports."/transactionsummaries_CARD_PRODUCT_TO_CONCILIE,CONCILIED.json";
		}else if(isset($request->conciliationStatus) and $request->conciliationStatus == "TO_CONCILIE,CONCILIED" ){
			$response = $reports."/transactionsummaries_TO_CONCILIE,CONCILIED.json";
		}else if(isset($request->groupBy) and isset($request->status) and $request->groupBy == "CANCELLATION_DAY,CARD_PRODUCT,ADJUST_TYPE" and $request->status == "CANCELLED" ){
			$response = $reports."/transactionsummaries_CANCELLATION_DAY,CARD_PRODUCT,ADJUST_TYPE.json";
		}else if(isset($request->adjustTypes) and isset($request->status) and $request->adjustTypes == "CANCELLATION" and $request->status == "CANCELLED" ){
				$response = $reports."/transactionsummaries_CANCELLED.json";
		}else if($this->isGettingLastMonth($endDate)) // dashboard transicoes mes passado
			$response = $dashboard."/calendario_transactionsummaries_last_month.json";
		else // dashboard transicoes
			$response = $dashboard."/calendario_transactionsummaries.json";

		return response()->file(storage_path($response));
	}


	public function isGettingLastMonth($date){
		 $settedMonth = intval(substr($date, 4,2));
		 $actualMonth = intval(date('n', strtotime('-1 month')));
		 $lastMonth = ($actualMonth > 0) ? $actualMonth - 1 : 0;
		return ($settedMonth == $lastMonth);
	}

}