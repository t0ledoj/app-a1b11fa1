<?php

namespace App\Services\Stock;

use App\Repositories\StockMovementRepository;
use Exception;

class StockHistoryService
{
    private $stockMovementRepository;

    public function __construct(StockMovementRepository $stockMovementRepository)
    {
        $this->stockMovementRepository = $stockMovementRepository;
    }

    /**
     * Fetch all stock movements from repository
     *
     * @param string|null $sku
     * @return string
     * @throws Exception
     */
    public function list(?string $sku): string
    {
        try {
            if ($sku) {
                return $this->stockMovementRepository->getStockBySku($sku);
            }
            return $this->stockMovementRepository->getAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
