<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\StockStoreRequest;
use App\Models\SkuStores;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SetController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StockStoreRequest $request) : JsonResponse
    {
        $validated = $request->validated();

        $result = SkuStores::updateOrCreate(
            ['sku' => $validated['sku'], 'store_id' => $validated['store_id']],
            ['amount' => $validated['amount']]
        );

        return response()->json($result, Response::HTTP_OK);
    }
}
