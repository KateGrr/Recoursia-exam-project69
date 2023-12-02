<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function __invoke(Request $data)
    {
        try {
            $posterminal = Posterminal::onlyTrashed()
            ->where('id', $data['id'])
            ->get()[0]->restore();
        } catch (\Throwable $th) {
            return response()->json($th->errorInfo[0]);
        }
        return response()->json('200');
    }
}
