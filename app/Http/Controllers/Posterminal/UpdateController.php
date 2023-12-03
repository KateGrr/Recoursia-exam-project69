<?php

namespace App\Http\Controllers\Posterminal;

use App\Http\Controllers\Controller;
use App\Models\Posterminal;
use App\Http\Requests\Posterminal\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $data)
    {
        $posterminal = $data->validated();
        try {
            $posterminalOld = Posterminal::find($data['id']);
            $posterminalOld->update([
                'status' => $posterminal['status'],
                'system_id' => $posterminal['system_id'],
                'address' => $posterminal['address'],
                'serial_number' => $posterminal['serial_number'],
            ]);
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
