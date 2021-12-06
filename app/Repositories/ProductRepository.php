<?php

namespace App\Repositories;

use App\Entities\Product;

class ProductRepository
{

    private $productEntity;

    public function __construct()
    {
        $this->productEntity = new Product();
    }

    public function get($sku)
    {
        return $this->productEntity->where('sku', $sku)->first();
    }

    public function getAll()
    {
        return $this->productEntity->all();
    }

    public function create($data)
    {
        return $this->productEntity->create($data);
    }

    public function update($sku, $data)
    {
        return $this->productEntity->where('sku', $sku)->update($data);
    }

    public function delete($sku)
    {
        return $this->productEntity->where('sku', $sku)->delete();
    }
}
