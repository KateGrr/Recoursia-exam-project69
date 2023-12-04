<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CardomatController extends Controller
{    
    /**
     * index
     *
     *  Получение всех продуктов для списка кардоматов
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cards = Card::all();
    
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'cards' => $cards
        ], 200);
    }
    
    /**
     * create
     *
     * Создание нового продукта в список покупок и возвращение полного списка покупок вместе с новым продуктом
     * 
     * @param  mixed $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        Card::create([
            'address' => $request->address,
            'status' => $request->status,
            'system_id' => $request->system_id,
            'serial_number' => $request->serial_number,
        ]);

        $cards = Card::all();

        return response()->json([
            'status'=> true,
            'message' => 'Product successfully created!',
            'cards' => $cards
        ], 200);
    }

        /**
     * edit
     *
     * Обноваление продукта и возвращение полного списка покупок с обновленным продуктом
     * 
     * @param  mixed $request
     * @return JsonResponse
     */
    public function edit(Request $request): JsonResponse
    {
        Card::find($request->id)->update([
            'address' => $request->address,
            'status' => $request->status,
            'system_id' => $request->system_id,
            'serial_number' => $request->serial_number,
        ]);

        $cards = Card::all();

        return response()->json([
            'status'=> true,
            'message'=> 'Product successfully updated',
            'cards'=> $cards
        ], 200);
    }

    public function delete($id) 
    {
        $card = Card::find($id);
    
        if (!$card) {
            return response()->json([
                'status' => false, 
                'message' => 'Card not found'
            ], 404);
        }
    
        $card->delete();
    
        $cards = Card::all();
    
        return response()->json([
            'status' => true, 
            'message' => 'Card deleted successfully', 
            'cards' => $cards
        ]);
    }
}