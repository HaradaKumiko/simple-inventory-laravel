<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Repositories\ProductHistoryRepository;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\DB;

class ProductHistoryService{
    protected $productHistoryRepository;
    protected $productRepository;

    public function __construct(ProductHistoryRepository $productHistoryRepository, ProductRepository $productRepository)
    {
        $this->productHistoryRepository = $productHistoryRepository;
        $this->productRepository = $productRepository;
    }


    public function findHistoryProductByIdChartService(string $product_id)
    {
        return $this->productHistoryRepository->findAsc($product_id);
    }

    public function findHistoryProductByIdService(string $product_id)
    {
        return $this->productHistoryRepository->findDesc($product_id);
    }

    public function createHistoryProductService(array $createHistoryProductRequest, string $user_id)
    {
        try {
            DB::beginTransaction();
    
            $productHistory = $this->productHistoryRepository->create($createHistoryProductRequest, $user_id);

            $type = $createHistoryProductRequest['type'];

            $stockChange = ($type === 'outgoing') ? -$createHistoryProductRequest['stock'] : $createHistoryProductRequest['stock'];

            $this->productRepository->updateStock($createHistoryProductRequest['product_id'], $stockChange);

            DB::commit();
    
            return $productHistory;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


}