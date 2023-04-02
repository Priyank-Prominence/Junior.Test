<?php
use App\Controller\ProductController;
use App\Utils\Database;
use App\Factory\ProductFactory;
require_once 'src/Utils/Database.php';
require_once 'src/Controller/ProductController.php';
require_once 'src/Factory/ProductFactory.php';

$productController = new ProductController();
$db = Database::getConnection();



if (empty($_POST['sku']) || empty($_POST['name']) || empty($_POST['price']) || empty($_POST['productType'])) {
    echo json_encode(['success' => false, 'message' => 'Please, submit required data']);
    exit;
}



if ($productController->skuExists($_POST['sku'], $db)) {
  echo json_encode(['success' => false,"message" => "A product with the same SKU already exists."]);
  exit;
}


try {
    $result = $productController->saveProduct($_POST);
    echo json_encode($result);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'An error occurred.']);
}
