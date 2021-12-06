<?php

namespace App\Http\Controllers\Api\Stock;

use App\Http\Controllers\Controller;
use App\Repositories\stockMovementRepository;
use App\Services\Stock\StockHistoryService;
use Exception;
use Illuminate\Http\JsonResponse;

class StockHistoryController extends Controller
{
    /**
     * @param string|null $sku
     * @return JsonResponse
     */
    public function index(?string $sku = ''): JsonResponse
    {
        try {
            $stockMovementRepository = new stockMovementRepository();
            $stockHistoryService = new StockHistoryService($stockMovementRepository);
            $data = $stockHistoryService->list($sku);

            return response()->json(['data' => $data]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
