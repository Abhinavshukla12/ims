<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\StockModel;

class Dashboard_controller extends BaseController
{
    public function index()
    {
        $stockModel = new StockModel();
        
        // Fetch total number of products
        $totalProducts = $stockModel->countAllResults();
        
        // Fetch products with low stock (assuming count < 10 is low stock)
        $lowStockCount = $stockModel->where('count <', 10)->countAllResults();

        // Fetch recent stock items (e.g., last 5 added)
        $recentStocks = $stockModel->orderBy('id', 'DESC')->findAll(5);
        
        // Fetch all stocks to calculate total stock value
        $allStocks = $stockModel->findAll();
        
        // Calculate total stock value
        $totalStockValue = 0;
        foreach ($allStocks as $stock) {
            $totalStockValue += $stock['price'] * $stock['count'];
        }

        $data = [
            'totalProducts' => $totalProducts,
            'lowStockCount' => $lowStockCount,
            'recentStocks' => $recentStocks,
            'totalStockValue' => $totalStockValue,
        ];

        return view('ImsViews/dashboard/index', $data);
    }
}
