<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * グループを作成する
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $user = User::find($request->user_id);

        $group = $user->createGroup($request->group_name);

        return response()->json([
            'message' => '新しいグループの作成に成功しました。',
            'error' => '',
            'data' => [],
        ]);
    }
}
