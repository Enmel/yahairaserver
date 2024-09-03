<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeOption;
use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class DeleteController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function __invoke(Request $request, ProductType $product_type, Attribute $attribute, AttributeOption $option) : JsonResponse
    {
        $option->delete();

        return response()->json([], Response::HTTP_OK);
    }
}
