<?php

namespace App\Services\Product;

use App\Repositories\ProductRepository;
use App\Repositories\StockMovementRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductCreateService
{
    private $productRepository;
    private $stockMovementRepository;

    public function __construct(ProductRepository $productRepository, StockMovementRepository $stockMovementRepository)
    {
        $this->productRepository = $productRepository;
        $this->stockMovementRepository = $stockMovementRepository;
    }

    /**
     * @param $productCreateRequest
     * @throws Exception
     */
    public function create($productCreateRequest): void
    {
        try {
            DB::beginTransaction();
            $data = $productCreateRequest->validated();
            $this->productRepository->create($data);
            $stockData = [
                'sku' => $data['sku'],
                'quantity' => $data['initialQuantity'],
            ];
            $this->stockMovementRepository->create($stockData);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
