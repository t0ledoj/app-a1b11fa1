<?php

namespace App\Repositories;

use App\Entities\StockMovement;

class StockMovementRepository
{
    private $stockEntity;

    public function __construct()
    {
        $this->stockEntity = new StockMovement();
    }

    public function getAll()
    {
        return $this->stockEntity->all();
    }

    public function getById($id)
    {
        return $this->stockEntity->find($id);
    }

    public function create(array $data)
    {
        return $this->stockEntity->create($data);
    }

    public function update(array $data, $id)
    {
        $stock = $this->stockEntity->find($id);
        return $stock->update($data);
    }

    public function delete($id)
    {
        $stock = $this->stockEntity->find($id);
        return $stock->delete();
    }

    public function getStockBySku($sku)
    {
        return $this->stockEntity->where('sku', $sku)->get();
    }
}
