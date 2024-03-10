<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductHistoryRepository;
use App\Http\Requests\CreateProductRequest;

class ProductService{
    protected $productRepository;
    protected $productHistoryRepository;

    public function __construct(ProductRepository $productRepository, ProductHistoryRepository $productHistoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->productHistoryRepository = $productHistoryRepository;
    }

    public function findAllProductService()
    {
        return $this->productRepository->getAll();
    }

    public function createProductService(CreateProductRequest $createProductRequest)
    {
        return $this->productRepository->create($createProductRequest);
    }

    public function countAllProductService()
    {
        return $this->productRepository->countAll();
    }

    public function countAllStockProductService()
    {
        return $this->productRepository->countAllStockProduct();
    }

    public function countAllStockProductIncomingService()
    {
        return $this->productHistoryRepository->countAllStockIncomingProduct();
    }

    public function countAllStockProductOutgoingService()
    {
        return $this->productHistoryRepository->countAllStockOutgoingProduct();
    }


}
