<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeasoningController extends Controller
{
    /**
     * 新規調味料を作成する
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return response()->json();
    }
}
