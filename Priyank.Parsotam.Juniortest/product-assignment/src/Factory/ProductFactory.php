<?php

namespace App\Factory;

use App\Model\ProductTypes\DVD;
use App\Model\ProductTypes\Book;
use App\Model\ProductTypes\Furniture;

// ...

class ProductFactory
{
    public static function createProduct($data)
    {
        $product = null;
        $productType = $data['productType'];
        $productTypeMapping = [
            'DVD' => $data['size']." MB",
            'Book'=> $data['weight']."KG",
            'Furniture'=> $data['height']."X".$data['width']."X".$data['height']
        ];
        $productTypeClassMapping = [
            'DVD' => DVD::class,
            'Book' => Book::class,
            'Furniture' => Furniture::class,
        ];

        if (isset($productTypeClassMapping[$productType])) {
            $class = $productTypeClassMapping[$productType];
            $product = new $class($data['sku'], $data['name'], $data['price'], $productTypeMapping[$productType]);
        }

        return $product;
    }
}
