<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductHistoryRepository;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;

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

    public function createProductService(array $createProductRequest, string $user_id)
    {
        return $this->productRepository->create($createProductRequest, $user_id);
    }


    public function findProductByIdService(string $product_id)
    {
        return $this->productRepository->find($product_id);
    }

    public function findAllHistoryProductByIdService(string $product_id)
    {
        return $this->productHistoryRepository->findAsc($product_id);
    }

    public function editProductService(array $editProductRequest, string $product_id)
    {
        $this->productRepository->find($product_id);
        return $this->productRepository->update($editProductRequest, $product_id);
    }

    public function deleteProductByIdService(string $product_id)
    {
        return $this->productRepository->delete($product_id);
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
