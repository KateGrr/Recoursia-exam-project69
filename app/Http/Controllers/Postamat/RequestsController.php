<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
use App\Models\PostamatRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index(): JsonResponse
    {
        $requests = PostamatRequest::with('postamat_id', 'theme_id', 'solution_id')->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'requests' => $requests,
        ], 200);
    }

    public function create(Request $request): JsonResponse
    {
        PostamatRequest::create($request);
        
        return $this->index();
    }
}
