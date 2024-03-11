<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHistoryProductRequest;
use Illuminate\Http\Request;
use App\Services\ProductHistoryService;
use Illuminate\Support\Facades\Auth;

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

    public function createProductStockHistoryController()
    {
        return view('history.create');
    }

    public function storeProductStockHistoryController(CreateHistoryProductRequest $createHistoryProductRequest)
    {        
        $validatedData = $createHistoryProductRequest->validated();
        $product_id = $validatedData['product_id'];

        $user_id = Auth::user()->user_id;
        $stock = $this->productHistoryService->createHistoryProductService($validatedData, $user_id);
        
        session()->flash('success', "Success Add Stock Product");
        return redirect()->route('products.view', ['product_id' => $product_id])->with([
            'reload' => true
        ]);
    }
}
