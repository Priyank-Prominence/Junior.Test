<?php
namespace App\Factory;
require_once 'src/Model/Product.php';
require_once 'src/Model/ProductType.php';


use App\Model\ProductType;

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

        if (isset($productTypeMapping[$productType])) {
            $specificAttribute = $productTypeMapping[$productType];
            $product = new ProductType($data['sku'], $data['name'], $data['price'],$productType, $specificAttribute);
        }

        return $product;
    }
}
