<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SeasoningController extends Controller
{
    /**
     * 新規調味料を作成する
     *
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $group = Group::find($request->group_id);

        $group->createSeasoning($request->seasoning_name);

        return response()->json();
    }
}
