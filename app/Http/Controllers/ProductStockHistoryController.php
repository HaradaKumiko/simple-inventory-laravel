<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductHistoryService;

class ProductStockHistoryController extends Controller
{
    protected $productHistoryService;

    public function __construct(ProductHistoryService $productHistoryService)
    {
        $this->productHistoryService = $productHistoryService;
    }

    public function viewHistoryController(string $product_id)
    {
        $product = $this->productHistoryService->findHistoryProductByIdChartService($product_id);
        return response()->json($product);
    }
}
