<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AdjustsController extends Controller
{
	public function response(Request $request){
		$reports = 'json/reports';
		$response = "";

		if($request->sort == 'payedDate,ASC')
			$response = $reports.'/ajusts_payedDate,ASC.json';

		return response()->file(storage_path($response));	
	}
}
