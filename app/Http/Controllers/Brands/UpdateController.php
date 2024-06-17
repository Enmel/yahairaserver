<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UpdateController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(StoreBrandRequest $request, Brand $brand) : JsonResponse
    {
        $validated = $request->validated();

        $brand->update($validated);

        return response()->json($brand, Response::HTTP_OK);
    }
}
