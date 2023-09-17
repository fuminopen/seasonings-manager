<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * 新規ユーザーの作成
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $user = User::createNew(
            $request->name,
            $request->email,
            $request->password
        );

        if (! $user->save()) {
            return response()->json(
                [
                    'message' => '新規ユーザーの登録に失敗しました。',
                    'error' => 'user.create.unexpected_error',
                    'data' => [],
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json([
            'message' => '新規ユーザーの登録が完了しました。',
            'error' => '',
            'data' => [],
        ]);
    }
}
