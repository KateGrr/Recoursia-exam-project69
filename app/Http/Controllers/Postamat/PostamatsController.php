<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postamat\StoreRequest;
use App\Models\Postamat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostamatsController extends Controller
{

    public function index(): JsonResponse
    {
        $postamats = Postamat::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'postamats' => $postamats
        ], 200);
    }

    public function create(StoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        $postamats = Postamat::create($request);

        return response()->json([
            'status' => true,
            'message' => 'Postamat successfully added',
            'postamats' => $postamats 
        ], 200);
    }

    public function edit(StoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        Postamat::find($request->id)->update([
            'status' => $request->status,
            'system_id' => $request->system_id,
            'address' => $request->address,
            'serial_number' => $request->serial_number
        ]);

        $postamats = Postamat::all();

        return response()->json([
            'status' => true,
            'message' => 'Postamat successfully updated',
            'postamats' => $postamats 
        ], 200);
    }

    public function delete(Request $request): JsonResponse
    {
        Postamat::find($request->id)->delete();

        $postamats = Postamat::all();

        return response()->json([
            'status' => true,
            'message' => 'Postamat successfully delete',
            'postamats' => $postamats 
        ], 200);
    }
}
