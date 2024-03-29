<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductRepository
{
    public function getAll()
    {
        $data = Product::orderBy('total_stock', 'desc')->with(['user'])->get();
        return $data;
    }

    public function create(array $createProductRequest, string $user_id)
    {
        $data = new Product;
        $data->product_id = Str::uuid();
        $data->user_id = $user_id;
        $data->name =  $createProductRequest['name'];
        $data->price = $createProductRequest['price'];
        $data->save();

        return $data;
    }

    public function update(array $editProductRequest, string $product_id)
    {
        $data = Product::find($product_id);
        $data->name = $editProductRequest['name'];
        $data->price = $editProductRequest['price'];
        $data->save();

        return $data;
    }

    public function updateStock(string $product_id, int $stockChange)
    {
        $data = Product::find($product_id);
        $data->total_stock += $stockChange;

        $data->save();

        return $data;
    }

    public function delete(string $product_id)
    {
        $data = Product::find($product_id);
        $data->delete();
        return $data;
    }

    public function find(string $product_id)
    {
        $data = Product::with(['user', 'productStockHistories'])->findOrFail($product_id);
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