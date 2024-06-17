<?php

namespace App\Http\Controllers\ProductTypes;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreProductTypeRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $product_type = ProductType::create([
            'name' => $validated['name'],
        ]);

        return response()->json($product_type, Response::HTTP_OK);
    }
}
