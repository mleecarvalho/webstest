<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FinancialsController extends Controller
{
	public function response(Request $request){
		$response = '';
		$financials = 'json/financials';
		if($request->groupBy == 'CARD_PRODUCT,STATUS' and $request->status == 'RECEIVED,FORETHOUGHT')
			$response = $financials.'/financial_RECEIVED_FORETHOUGHT.json';
		else if($request->groupBy == 'STATUS' and $request->status == 'RECEIVED,FORETHOUGHT')
			$response = $financials.'/financial_STATUS_RECEIVED_FORETHOUGHT.json';
		else if($request->groupBy == 'CARD_PRODUCT,STATUS' and $request->status == 'EXPECTED')
			$response = $financials.'/financial_CARDPRODUCT_EXPECTED.json';
		else if($request->groupBy == 'ACQUIRER' and $request->status == 'EXPECTED')
			$response = $financials.'/financial_ACQUIRER_EXPECTED.json';
		return response()->file(storage_path($response));
	}
}
