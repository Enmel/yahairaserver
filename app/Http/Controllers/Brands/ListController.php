<?php

namespace App\Http\Controllers\Brands;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ListController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request) : JsonResponse
    {
        $brands = Brand::paginate(15);

        return response()->json($brands, Response::HTTP_OK);
    }
}
