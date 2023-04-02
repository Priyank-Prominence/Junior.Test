<?php
namespace App\Model\ProductTypes;
require_once 'src/Model/Product.php';

use App\Model\Product;

class Furniture extends Product
{
    public function __construct($sku, $name, $price, $dimensions)
    {
        parent::__construct($sku, $name, $price, 'Furniture', $dimensions);
    }
}
