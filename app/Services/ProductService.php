<?php
namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findAllProductService()
    {
        return $this->productRepository->getAll();
    }

    public function countAllProductService()
    {
        return $this->productRepository->countAll();
    }

    public function countAllStockProductService()
    {
        return $this->productRepository->countAllStockProduct();
    }


}
