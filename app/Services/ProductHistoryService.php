<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductHistoryRepository;
use App\Http\Requests\CreateProductRequest;

class ProductHistoryService{
    protected $productHistoryRepository;

    public function __construct(ProductHistoryRepository $productHistoryRepository)
    {
        $this->productHistoryRepository = $productHistoryRepository;
    }


    public function findHistoryProductByIdChartService(string $product_id)
    {
        return $this->productHistoryRepository->findAsc($product_id);
    }

    public function findHistoryProductByIdService(string $product_id)
    {
        return $this->productHistoryRepository->findDesc($product_id);
    }


}