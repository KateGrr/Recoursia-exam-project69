<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal;
use App\Http\Requests\Posterminal\StoreRequest;

class CreateController extends Controller
{
    public function __invoke(StoreRequest $data)
    {
        $posterminal = $data->validated();
        try {
            Posterminal::create($posterminal);
        } catch (\Throwable $th) {
            if ($th->errorInfo[0] === '23000') {
                return response()->json($th->errorInfo[2]);
            } else {
                return response()->json($th->errorInfo[0]);
            }
        }
        return response()->json('200');
    }
}
