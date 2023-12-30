<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Postamat\ThemesStoreRequest;
use App\Http\Requests\Postamat\ThemesUpdateRequest;
use App\Models\PostamatTheme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemesController extends Controller
{
    public function index(): JsonResponse
    {
        $themes = PostamatTheme::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'themes' => $themes
        ], 200);
    }

    public function create(ThemesStoreRequest $request): JsonResponse
    {
        $request = $request->validated();

        $themes = PostamatTheme::create($request);

        $themes = PostamatTheme::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'themes' => $themes
        ], 200);
    }

    public function edit(ThemesUpdateRequest $request): JsonResponse
    {
        $data = $request->validated();

        PostamatTheme::find($request->id)->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        return $this->index();
    }

    public function delete(Request $request): JsonResponse
    {
        PostamatTheme::find($request->id)->delete();

        return $this->index();
    }
}
