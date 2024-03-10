<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\CreateProductRequest;

class ProductRepository
{
    public function getAll()
    {
        $data = Product::orderBy('total_stock', 'desc')->with(['user'])->get();
        return $data;
    }

    public function create(CreateProductRequest $createProductRequest)
    {
        $data = new Product;
        $data->product_id = Str::uuid();
        $data->user_id = "ce9e7c1c-7756-4696-9ed0-2c1c512be8eb";
        $data->name = "test";
        $data->price = 1_000_000;
        $data->save();

        return $data;
    }
    
    public function countAll()
    {
        return Product::count();
    }

    public function countAllStockProduct()
    {
        $data = DB::table('products')
            ->select(DB::raw("SUM(total_stock) as total_stock"))
            ->first();

        $data = $data->total_stock;

        return $data ?? 0;
    }
}