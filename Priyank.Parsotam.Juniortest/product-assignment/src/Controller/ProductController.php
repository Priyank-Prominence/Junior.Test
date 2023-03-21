<?php

namespace App\Controller;

use App\Factory\ProductFactory;
use App\Utils\Database;

class ProductController
{
    public function saveProduct($data)
    {
        $db = Database::getConnection();
        $product = ProductFactory::createProduct($data);

        if ($product) {
            try {

                $product->save($db);
                return ['success' => true];
            } catch (Exception $e) {
                return ['success' => false, 'message' => $e->getMessage()];
            }
        } else {
            return ['success' => false, 'message' => 'Invalid product type.'];
        }
    }

    public function skuExists($sku, $db)
    {
        $query = $db->prepare("SELECT COUNT(*) FROM products WHERE sku = :sku");
        $query->bindParam(":sku", $sku);
        $query->execute();
        return $query->fetchColumn() > 0;
    }
}
