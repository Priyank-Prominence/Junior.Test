<?php

namespace App\Model\ProductTypes;

use App\Model\Product;

class DVD extends Product
{
    public function __construct($sku, $name, $price, $size_mb)
    {
        parent::__construct($sku, $name, $price, 'DVD', $size_mb);
    }
}
