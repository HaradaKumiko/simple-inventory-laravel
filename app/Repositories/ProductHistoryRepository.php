<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductStockHistory;
use Illuminate\Support\Facades\DB;

class ProductHistoryRepository
{
    public function countAllStockIncomingProduct()
    {
        $data = DB::table('product_stock_histories')
        ->select(DB::raw("SUM(stock) as stock"))
        ->where('type', 'incoming')
        ->first();


        $data = $data->stock;

        return $data ?? 0;
    }

    public function countAllStockOutgoingProduct()
    {
        $data = DB::table('product_stock_histories')
        ->select(DB::raw("SUM(stock) as stock"))
        ->where('type', 'outgoing')
        ->first();

        $data = $data->stock;

        return $data ?? 0;
    }

    public function findDesc(string $product_id)
    {
        $data = ProductStockHistory::where('product_id', $product_id)->orderBy('created_at', 'desc')->get();
        return $data;
    }

    public function findAsc(string $product_id)
    {
        $data = ProductStockHistory::where('product_id', $product_id)->orderBy('created_at', 'asc')->get();
        return $data;
    }
}