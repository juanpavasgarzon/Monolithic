<?php

namespace App\Core\Product\Controllers;

use App\Common\Controller\Controller;
use App\Core\Product\Request\AddProductRequest;
use App\Core\Product\Services\AddProductService;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Tag(
 *     name="Product",
 *     description="Operations related to product magnament"
 * )
 */
class ProductController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/products",
     *     summary="Create a new product",
     *     tags={"Product"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"name", "price", "quantity", "sku"},
     *             @OA\Property(property="name", type="string", example="Short")
     *             @OA\Property(property="price", type="number", format="float", example=199.99),
     *             @OA\Property(property="quantity", type="integer", example=100),
     *             @OA\Property(property="sku", type="string", example="PROD001"),
     *             @OA\Property(property="description", type="string", example="A high-quality product")
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Product created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Product created successfully"),
     *             @OA\Property(
     *                 property="product",
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Short")
     *                 @OA\Property(property="price", type="number", format="float", example=199.99),
     *                 @OA\Property(property="quantity", type="integer", example=100),
     *                 @OA\Property(property="sku", type="string", example="PROD001"),
     *                 @OA\Property(property="description", type="string", example="A high-quality product"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-11-15T10:00:00"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-11-15T10:00:00")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="400",
     *         description="Invalid input"
     *     )
     * )
     */
    public function create(AddProductRequest $request, AddProductService $service): JsonResponse
    {
        $name = $request->name();
        $price = $request->price();
        $quantity = $request->quantity();
        $sku = $request->sku();
        $description = $request->description();

        $product = $service->handle($name, $price, $quantity, $sku, $description);

        return response()->json(['product' => $product], 201);
    }
}
