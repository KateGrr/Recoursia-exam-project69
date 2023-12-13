<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postamat\DefectiveStoreRequest;
use App\Models\DefectivePostamat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefectiveController extends Controller
{
    public function index(): JsonResponse
    {
        $defectives = DefectivePostamat::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'defectives' => $defectives
        ], 200);
    }

    public function create(DefectiveStoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        $defectives = DefectivePostamat::create($request);

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'defectives' => $defectives
        ], 200);
    }
}
