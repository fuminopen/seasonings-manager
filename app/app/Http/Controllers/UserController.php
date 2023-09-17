<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 新規ユーザーの作成
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        User::createNew(
            $request->name,
            $request->email,
            $request->password
        );

        return response()->json([
            'message' => '新規ユーザーの登録が完了しました。',
            'error' => '',
            'data' => [],
        ]);
    }
}
