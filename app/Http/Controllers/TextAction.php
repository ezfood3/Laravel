<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

use function response;

final class TextAction extends Controller
{
    public function __invoke(Request $request): IlluminateResponse
    {
        $response = Response::make('hello world'); // 파사드 이용
        // 헬퍼 함수 이용 시
        $response = response('hello world'); // 헬퍼함수 이용 1
        // content-type 변경
        $response = response( // 헬퍼함수 이용 2
            'hello world',
            IlluminateResponse::HTTP_OK,
            [
                'content-type' => 'text/plain'
            ]
        );
        return $response;
    }
}
