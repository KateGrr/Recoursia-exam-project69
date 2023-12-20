<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postamat\StoreRequest;
use App\Http\Requests\Postamat\UpdateRequest;
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
        $data = $request->validated();

        Postamat::create($data);

        return $this->index();
    }

    public function edit(UpdateRequest $request): JsonResponse
    {
        $data = $request->validated();

        Postamat::find($request->id)->update([
            'status' => $data['status'],
            'system_id' => $data['system_id'],
            'address' => $data['address'],
            'serial_number' => $data['serial_number']
        ]);

        return $this->index();
    }

    public function delete(Request $request): JsonResponse
    {
        Postamat::find($request->id)->delete();

        return $this->index();
    }

    public function showDeleted(): JsonResponse
    {
        $deletedPostamats = Postamat::onlyTrashed()->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'deletedPostamats' => $deletedPostamats
        ], 200);
    }

    public function restore(Request $request): JsonResponse
    {
        Postamat::withTrashed()->find($request->id)->restore();

        $deletedPostamats = Postamat::onlyTrashed()->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'deletedPostamats' => $deletedPostamats
        ], 200);
    }
}
