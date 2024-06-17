<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreBrandRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $brand = Brand::create([
            'name' => $validated['name'],
        ]);

        return response()->json($brand, Response::HTTP_OK);
    }
}
