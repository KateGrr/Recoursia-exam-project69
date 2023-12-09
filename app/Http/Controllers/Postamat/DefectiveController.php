<?php

namespace App\Http\Controllers\Postamat;

use App\Http\Controllers\Controller;
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
}
