<?php

namespace App\Http\Controllers\Cardomat;

use App\Http\Controllers\Controller;
use App\Models\Defective;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardomatThemeController extends Controller
{
    public function index(): JsonResponse
    {
        $defectives = Defective::all();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'defectives' => $defectives,
        ], 200);
    }

    public function create(Request $request): JsonResponse
    {
        Defective::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        $defectives = Defective::all();
    
        return response()->json([
            'status' => true,
            'message' => 'Product successfully created!',
            'defectives' => $defectives,
        ], 200);
    }

    public function edit(Request $request): JsonResponse
    {
        Defective::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $defectives = Defective::all();

        return response()->json([
            'status'=> true,
            'message'=> 'Product successfully updated',
            'defectives' => $defectives,
        ], 200);
    }

    public function delete($id) 
    {
        $defective = Defective::find($id);
    
        if (!$defective) {
            return response()->json([
                'status' => false, 
                'message' => 'defective not found'
            ], 404);
        }
    
        $defective->delete();
    
        $defectives = Defective::all();
    
        return response()->json([
            'status' => true, 
            'message' => 'defective deleted successfully', 
            'defectives' => $defectives,
        ]);
    }

    public function find()
{
    try {
        $themes = Defective::all();

        return response()->json([
            'themes' => $themes,
            'status' => true
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'status' => false
        ], 500);
    }
}
}