<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal;
use Illuminate\Http\Request;

class ShowExistingController extends Controller
{
    public function __invoke()
    {
        try {
            return response()->json(['200', Posterminal::all()]);
        } catch (\Throwable $th) {
            return response()->json($th->errorInfo[0]);
        }
    }
}
