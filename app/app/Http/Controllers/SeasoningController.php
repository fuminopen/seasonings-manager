<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Seasoning;
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

    /**
     * グループの調味料を取得する
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $seasonings = Seasoning::whereGroupId($request->group_id)
            ->get();

        return response()->json([
            'data' => array_map(
                fn (Seasoning $seasoning) => [
                    'id' => $seasoning->id,
                    'name' => $seasoning->name,
                    'remaining' => $seasoning->remaining
                ],
                $seasonings->all()
            )
        ]);
    }
}
