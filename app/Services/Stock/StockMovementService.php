<?php

namespace App\Services\Stock;

use App\Repositories\StockMovementRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class StockMovementService
{
    private $stockMovementRepository;

    public function __construct(StockMovementRepository $stockMovementRepository)
    {
        $this->stockMovementRepository = $stockMovementRepository;
    }

    /**
     * @param $stockMovementRequest
     * @throws Exception
     */
    public function create($stockMovementRequest): void
    {
        try {
            DB::beginTransaction();
            $data = $stockMovementRequest->validated();
            $this->stockMovementRepository->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
