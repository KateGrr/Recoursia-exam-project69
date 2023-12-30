<?php

namespace App\Http\Controllers\Cardomat;

use App\Http\Controllers\Controller;
use App\Models\Cardomat_requests;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Cardomat\RequestsClosedRequest;
use Illuminate\Http\Request;

class CardomatRequestsController extends Controller
{
    public function index(): JsonResponse
    {
        $requests = Cardomat_requests::with('theme', 'cardomat', 'solution')->get();

        return response()->json([
            'status' => true,
            'message' => 'Success',
            'requests' => $requests,
        ], 200);
    }

    public function create(Request $request): JsonResponse
    {
        Cardomat_requests::create([
            'status' => $request->status,
            'cardomat_id' => $request->cardomat_id,
            'theme_id' => $request->theme_id,
        ]);
    
        $requests = Cardomat_requests::with('theme', 'cardomat', 'solution')->get();
    
        return response()->json([
            'status' => true,
            'message' => 'Product successfully created!',
            'requests' => $requests,
        ], 200);
    }

    public function complete(RequestsClosedRequest $request): JsonResponse
    {
        Cardomat_requests::find($request->id)->update([
            'solution_id' => $request->solution_id,
        ]);

        $requests = Cardomat_requests::with('theme', 'cardomat', 'solution')->get();

        return response()->json([
            'status'=> true,
            'message'=> 'Product successfully updated',
            'requests' => $requests,
        ], 200);
    }

    public function changeStatus(Request $request)
    {
        $requestId = $request->input('requestId');
        $newStatus = $request->input('newStatus');

        $request = Cardomat_requests::findOrFail($requestId);

        $request->status = $newStatus;
        $request->save();

        $requests = Cardomat_requests::with('theme', 'cardomat', 'solution')->get();

        return response()->json([
            'status' => true,
            'requests' => $requests,
        ]);
    } 
}