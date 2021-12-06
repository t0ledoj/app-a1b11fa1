<?php

namespace App\Http\Controllers\Api\Stock;

use App\Http\Controllers\Controller;
use App\Http\Requests\Stocks\StockMovementRequest;
use App\Repositories\StockMovementRepository;
use App\Services\Stock\StockMovementService;
use Exception;
use Illuminate\Http\JsonResponse;

class StockMovementController extends Controller
{
    /**
     * @param StockMovementRequest $stockMovementRequest
     * @return JsonResponse
     * @throws Exception
     */
    public function index(StockMovementRequest $stockMovementRequest): JsonResponse
    {
        try {
            $stockMovementRepository = new StockMovementRepository();
            $stockMovementService = new StockMovementService($stockMovementRepository);
            $stockMovementService->create($stockMovementRequest);

            return response()->json(['message' => 'Stock movement saved successfully'], 201);
        }catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
