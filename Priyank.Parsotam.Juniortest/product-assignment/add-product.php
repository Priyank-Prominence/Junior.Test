<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Product Add</title>
</head>

<body>
    <div class="container">
        <form id="product_form">
            <div class="row mt-3 border-bottom">
                <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                    <h3>Product Add</h3>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                    <div class="d-flex justify-content-end">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>      
                        <button class="btn btn-danger cancel-btn">Cancel</button>
                      </div>  
                    </div>
                    
                    
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-9">
                    <div id="notification" class="alert alert-danger" style="display: none;">
                        
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <label for="sku">SKU:</label>    
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="sku" name="sku" class="form-control" required>    
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-lg-3">
                                <label for="name">Name:</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-lg-3">
                                <label for="price">Price ($):</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
                            </div>
                        </div>    
                        <div class="row align-items-center mt-3">
                            <div class="col-lg-3">
                                <label for="productType">Type Switcher:</label>
                            </div>
                            <div class="col-lg-6">
                                <select id="productType" name="productType" class="form-control" required>
                                    <option value="">Type Switcher</option>
                                    <option value="DVD">DVD</option>
                                    <option value="Book">Book</option>
                                    <option value="Furniture">Furniture</option>
                                </select>
                            </div>
                        </div>    
                        <div id="DVD" style="display: none;">
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3">
                                    <label for="size">Size (MB):</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" id="size" name="size" step="0.01" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div id="Book" style="display: none;">
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3">
                                    <label for="weight">Weight (KG):</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" id="weight" name="weight" step="0.01" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div id="Furniture" style="display: none;">
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3">
                                    <label for="height">Height (CM):</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" id="height" name="height" step="0.01" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3">
                                    <label for="width">Width (CM):</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" id="width" name="width" step="0.01" class="form-control" >
                                </div>
                            </div>
                            <div class="row mt-3 align-items-center">
                                <div class="col-lg-3">
                                    <label for="length">Length (CM):</label>
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" id="length" name="length" step="0.01" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-9">
                                <p id="special-attribute-description"></p>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </div>

        
        
        
        

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>