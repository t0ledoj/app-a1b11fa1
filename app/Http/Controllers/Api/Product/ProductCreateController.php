<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductCreateService;
use App\Repositories\ProductRepository;
use App\Repositories\stockMovementRepository;
use App\Http\Requests\Product\ProductCreateRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class ProductCreateController extends Controller
{
    /**
     * @param ProductCreateRequest $productCreateRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function index(ProductCreateRequest $productCreateRequest): JsonResponse
    {
        try {
            $productRepository = new ProductRepository();
            $stockMovementRepository = new stockMovementRepository();
            $productCreateService = new ProductCreateService($productRepository, $stockMovementRepository);
            $productCreateService->create($productCreateRequest);

            return response()->json([
                'message' => 'Product created successfully'
            ], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
