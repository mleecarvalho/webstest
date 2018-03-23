<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class AssociarTerminal extends Controller
{
	public function response(Request $request){
		$response = 'mobred/associate_terminal_success.json';
		return response()->file(storage_path($response));
	}
}
