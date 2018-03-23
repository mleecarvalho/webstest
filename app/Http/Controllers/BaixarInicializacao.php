<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class BaixarInicializacao extends Controller
{
	public function response(Request $request){
		$response = 'LOJISTA_14.TBL';
//		return response()->file(storage_path($response));


    return  response('mobred', 200, [
      'Content-Type' => 'application/json',
      'Content-Disposition' => 'attachment; filename="'.$response.'"',
    ]);
	}
}
