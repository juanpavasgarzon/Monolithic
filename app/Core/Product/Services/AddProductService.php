<?php

namespace App\Core\Product\Services;

use App\Core\Product\Models\Product;
use App\Core\Product\Repositories\ProductRepository;

class AddProductService
{
    /**
     * @var ProductRepository
     */
    private ProductRepository $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @param float $price
     * @param int $quantity
     * @param string $sku
     * @param string $description
     * @return Product
     */
    public function handle(string $name, float $price, int $quantity, string $sku, string $description): Product
    {
        return $this->repository->create($name, $price, $quantity, $sku, $description);
    }
}
