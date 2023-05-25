<?php
namespace App\Model;
require_once 'src/Model/Product.php';

class ProductType extends Product
{
    public function __construct($sku, $name, $price, $productType, $specificAttribute)
    {
        parent::__construct($sku, $name, $price, $productType, $specificAttribute);
    }
}