<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Request $data)
    {
        try {
            $posterminal = Posterminal::find($data['id']);
            $posterminal->update(['status' => '0']);
            $posterminal->delete();
        } catch (\Throwable $th) {
            return response()->json($th->errorInfo[0]);
        }
        return response()->json('200');
    }
}
