<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postamat\SolutionsStoreRequest;
use App\Http\Requests\Postamat\SolutionsUpdateRequest;
use App\Models\DefectivePostamat;
use App\Models\PostamatSolution;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SolutionsController extends Controller
{
    public function index(): JsonResponse
    {
        $solutions = PostamatSolution::all();
        $defective = DefectivePostamat::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'solutions' => $solutions,
            'defective' => $defective
        ], 200);
    }

    public function create(SolutionsStoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        $solutions = PostamatSolution::create($request);

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'solutions' => $solutions
        ], 200);
    }

    public function edit(SolutionsUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();

        PostamatSolution::find($request->id)->update([
            'theme_id' => $data['theme_id'],
            'title' => $data['title']
        ]);

        return $this->index();
    }

    public function delete(Request $request): JsonResponse
    {
        PostamatSolution::find($request->id)->delete();

        return $this->index();
    }
}
