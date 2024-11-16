<?php

namespace App\Core\Product\Repositories;

use App\Core\Product\Models\Product;

class ProductRepository
{
    /**
     * @param string $name
     * @param float $price
     * @param int $quantity
     * @param string $sku
     * @param string $description
     * @return Product
     */
    public function create(string $name,float $price, int $quantity, string $sku, string $description): Product
    {
        $product = new Product();

        $product->name = $name;
        $product->price = $price;
        $product->quantity = $quantity;
        $product->sku = $sku;
        $product->description = $description;
        $product->save();

        return $product;
    }
}
