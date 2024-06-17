<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, Brand $brand) : JsonResponse
    {
        $brand->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
