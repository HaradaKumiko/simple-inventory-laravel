<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\CreateProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function findAllProductController()
    {
        $products = $this->productService->findAllProductService();
        $totalProduct = $this->productService->countAllProductService();
        $totalStock = $this->productService->countAllStockProductService();
        $totalIncomingStock = $this->productService->countAllStockProductIncomingService();
        $totalOutgoingStock = $this->productService->countAllStockProductOutgoingService();
        return view('product.index', compact('products', 'totalProduct', 'totalStock', 'totalIncomingStock', 'totalOutgoingStock'));
    }

    public function createProductController()
    {
       
        return view('product.create');
    }

    public function storeProductController(CreateProductRequest $createProductRequest) 
    {
        $validatedData = $createProductRequest->validated();
        $product = $this->productService->createProductService($validatedData);

        session()->flash('success', "Success Create New Product");
        return redirect()->route('products.index')->with([
            'reload' => true
        ]);


    }
}
