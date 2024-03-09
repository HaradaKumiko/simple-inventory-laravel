<?php
namespace App\Repositories;

use App\Models\Product;
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
}