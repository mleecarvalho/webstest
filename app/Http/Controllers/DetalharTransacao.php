<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class DetalharTransacao extends Controller
{
	public function response(Request $request){
		$path = 'mobred';
		$response = $path.'/detalharTransacao.json';
		return response()->file(storage_path($response));
	}
}
