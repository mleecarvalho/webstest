<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdjustSummariesController extends Controller
{
	public function response(Request $request){
		$financial = 'json/financials';
		$response = "";

		if($request->groupBy == 'TYPE,DESCRIPTION' and $request->status == 'RECEIVED,FORETHOUGHT')
			$response = $financial.'/adjustsummaries_RECEIVED_FORETHOUGHT.json';
		else if($request->groupBy == 'TYPE' and $request->status == 'RECEIVED,FORETHOUGHT')
			$response = $financial.'/adjustsummaries_TYPE_OTHER_RECEIVED_FORETHOUGHT.json';

		return response()->file(storage_path($response));	
	}
}
