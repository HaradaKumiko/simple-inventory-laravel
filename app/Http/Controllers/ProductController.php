<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function findAllController()
    {
        $products = $this->productService->findAllProductService();
        $totalProduct = $this->productService->countAllProductService();
        $totalStock = $this->productService->countAllStockProductService();
        $totalIncomingStock = $this->productService->countAllStockProductIncomingService();
        $totalOutgoingStock = $this->productService->countAllStockProductOutgoingService();
        return view('product.index', compact('products', 'totalProduct', 'totalStock', 'totalIncomingStock', 'totalOutgoingStock'));
    }
}
