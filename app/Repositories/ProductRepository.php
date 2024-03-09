<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function getAll()
    {
        return Product::orderBy('total_stock', 'desc')->simplePaginate(5);
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