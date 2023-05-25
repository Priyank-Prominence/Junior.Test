<?php
use App\Utils\Database;
use App\Model\Product;


require_once 'vendor/autoload.php';


header('Content-Type: application/json');

if (isset($_POST['mass_delete']) && isset($_POST['selected_products'])) {
    $db = new Database();
    $pdo = $db->getConnection();

    $selectedProducts = $_POST['selected_products'];

    if (count($selectedProducts) > 0) {
        $placeholders = implode(',', array_fill(0, count($selectedProducts), '?'));

        $query = "DELETE FROM products WHERE sku IN ($placeholders)";
        $stmt = $pdo->prepare($query);
        $stmt->execute($selectedProducts);

        echo json_encode('success');
        exit();
    }
}

echo json_encode('error');
exit();
