<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\PurchaseModel;
use App\Models\SalesOrderModel;

class Dashboard_controller extends BaseController
{
    public function index()
    {
        $stockModel = new StockModel();
        $purchaseModel = new PurchaseModel();
        $salesModel = new SalesOrderModel();
        
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

        // Fetch total number of purchases and total purchase value
        $totalPurchases = $purchaseModel->countAllResults();
        $allPurchases = $purchaseModel->findAll();
        $totalPurchaseValue = 0;
        foreach ($allPurchases as $purchase) {
            $totalPurchaseValue += $purchase['TotalAmount'];
        }

        // Fetch total number of sales and total sales value
        $totalSales = $salesModel->countAllResults();
        $allSales = $salesModel->findAll();
        $totalSalesValue = 0;
        foreach ($allSales as $sale) {
            $totalSalesValue += $sale['total_amount'];
        }

        $data = [
            'totalProducts' => $totalProducts,
            'lowStockCount' => $lowStockCount,
            'recentStocks' => $recentStocks,
            'totalStockValue' => $totalStockValue,
            'totalPurchases' => $totalPurchases,
            'totalPurchaseValue' => $totalPurchaseValue,
            'totalSales' => $totalSales,
            'totalSalesValue' => $totalSalesValue,
        ];

        return view('ImsViews/dashboard/index', $data);
    }
}
