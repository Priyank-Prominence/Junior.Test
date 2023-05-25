<?php

require_once __DIR__ . '/vendor/autoload.php';
use App\Model\Product;
use App\Utils\Database;



$db = new Database();
$products = Product::getAllProducts($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Product list</title>
</head>
<body>
    <div class="container">
      <div class="row mt-3 border-bottom">
            <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                <h3>Product List</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                <div class="d-flex justify-content-end">
                  <div class="form-group">
                    <button type="button" class="add-btn btn btn-success">ADD</button>      
                    <button id="delete-product-btn" type="button" class="btn btn-danger">MASS DELETE</button>
                  </div>  
                </div>
                
                
            </div>
        </div>  
        <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 mt-3">
                <div class="product-check-list">
                    <div class="form-check">
                        <input class="form-check-input delete-checkbox" value="<?php echo $product['sku'];  ?>" type="checkbox" >
                        <div class="product-item p-2">
                          <p><?php echo $product['sku'];  ?></p>
                          <p><?php echo $product['name'];  ?></p>
                          <p><?php echo $product['price'];  ?></p>
                          <p><?php echo $product['productTypeLabels'][$product['productType']]."<br><br>".$product['specificAttribute'];  ?></p>
                        </div>
                    </div>
               
                </div>
            </div>
        <?php endforeach; ?>    
        </div>
        
        
    </div>
 

        

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>