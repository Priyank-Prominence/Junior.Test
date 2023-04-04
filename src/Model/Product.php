<?php

namespace App\Model;

use App\Utils\Database;



abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;
    protected $productType;
    protected $specificAttribute;

    public function __construct($sku, $name, $price, $productType, $specificAttribute)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->setProductType($productType);
        $this->setSpecificAttribute($specificAttribute);
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getProductType()
    {
        return $this->productType;
    }

    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    public function getSpecificAttribute()
    {
        return $this->specificAttribute;
    }

    public function setSpecificAttribute($specificAttribute)
    {
        $this->specificAttribute = $specificAttribute;
    }

    public static function createFromArray(array $data): self
    {
        $product = new class ('', '', 0, '', '') extends Product {
            public function __construct($sku, $name, $price, $productType, $specificAttribute)
            {
                parent::__construct($sku, $name, $price, $productType, $specificAttribute);
            }
        };

        $product->setSku($data['sku'] ?? null);
        $product->setName($data['name'] ?? null);
        $product->setPrice($data['price'] ?? null);
        $product->setProductType($data['productType'] ?? null);
        $product->setSpecificAttribute($data['specificAttribute'] ?? null);

        return $product;
    }

    public static function getAllProducts(Database $db): array
    {
        $pdo = $db->getConnection();
        $query = "SELECT * FROM products ORDER BY id ASC";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $products = [];

        $productTypeLabels = [
            'DVD' => 'Size: ',
            'Book' => 'Weight: ',
            'Furniture' => 'Dimension: '
        ];

        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $product = Product::createFromArray($row);
            $products[] = [
                'sku' => $product->getSku(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'productType' => $product->getProductType(),
                'productTypeLabels' => $productTypeLabels,
                'specificAttribute' => $product->getSpecificAttribute()
            ];
        }

        return $products;
    }

    public function save($db)
    {
        $query = "INSERT INTO products (sku, name, price, productType, specificAttribute) VALUES (:sku, :name, :price, :productType, :specificAttribute)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':sku' => $this->getSku(),
            ':name' => $this->getName(),
            ':price' => $this->getPrice(),
            ':productType' => $this->getProductType(),
            ':specificAttribute' => $this->getSpecificAttribute()
        ]);
    }
}
