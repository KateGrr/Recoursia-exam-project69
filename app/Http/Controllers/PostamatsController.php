<?php

namespace App\Http\Controllers;

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
}
