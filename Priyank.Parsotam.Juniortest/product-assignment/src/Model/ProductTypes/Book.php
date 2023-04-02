<?php
namespace App\Model\ProductTypes;
require_once 'src/Model/Product.php';


use App\Model\Product;

class Book extends Product
{
    public function __construct($sku, $name, $price, $weight_kg)
    {
        parent::__construct($sku, $name, $price, 'Book', $weight_kg);
    }
}
