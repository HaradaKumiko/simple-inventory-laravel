<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Services\ProductHistoryService;
use Illuminate\Support\ValidatedInput;

class ProductController extends Controller
{
    protected $productService;
    protected $productHistoryService;

    public function __construct(ProductService $productService, ProductHistoryService $productHistoryService)
    {
        $this->productService = $productService;
        $this->productHistoryService = $productHistoryService;
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

    public function viewProductController(string $product_id)
    {
        $product = $this->productService->findProductByIdService($product_id);
        $histories = $this->productHistoryService->findHistoryProductByIdService($product_id);
        return view('product.view', compact('product', 'histories'));
    }

    public function editProductController(string $product_id)
    {
        $product = $this->productService->findProductByIdService($product_id);
        return view('product.edit', compact('product'));
    }

    public function updateProductController(EditProductRequest $editProductRequest, string $product_id)
    {
        $validatedData = $editProductRequest->validated();
        $product = $this->productService->editProductService($validatedData, $product_id);

        session()->flash('success', "Success Edit Product");
        return redirect()->route('products.index')->with([
            'reload' => true
        ]);
    }

    public function deleteProductController(string $product_id)
    {
        $product = $this->productService->deleteProductByIdService($product_id);
        session()->flash('success', "Success Delete Product");
        return redirect()->route('products.index')->with([
            'reload' => true
        ]);
    }
}
