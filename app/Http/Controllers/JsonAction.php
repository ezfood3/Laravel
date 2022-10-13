<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use function response;

class JsonAction extends Controller
{
    public function __invoke(Request $request):JsonResponse{
        // $response = Response::json(['status' => 'success']); // 파사드 이용

        $res_json = $request->json('nested');

        // 비즈니스 로직 호출

        // $response = response()->json(['status' => 'success','req_nested' => $res_json]);
        $response = response()->jsonp('callback3',['status' => 'success','req_nested' => $res_json]);
        return $response;
    }
}
