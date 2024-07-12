<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use App\Models\SalesModel;
use App\Models\PurchaseOrderModel;
use App\Models\ItemModel;
use App\Models\SupplierModel;
use App\Models\DocumentModel;
use App\Models\WarehouseModel;
use App\Models\EmployeeModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the dashboard.');
        }

        // If user is logged in, fetch dashboard data
        $stockModel = new StockModel();
        $salesModel = new SalesModel();
        $purchaseModel = new PurchaseOrderModel();
        $itemModel = new ItemModel();
        $supplierModel = new SupplierModel();
        $documentModel = new DocumentModel();
        $warehouseModel = new WarehouseModel();
        $employeeModel = new EmployeeModel();

        // Fetch data for statistics
        $data = [
            'stocks' => $stockModel->findAll(),
            'sales' => $salesModel->findAll(),
            'purchases' => $purchaseModel->findAll(),
            'items' => $itemModel->findAll(),
            'suppliers' => $supplierModel->findAll(),
            'documents' => $documentModel->findAll(),
            'warehouses' => $warehouseModel->findAll(),
            'employees' => $employeeModel->findAll(),
            'recentSales' => $salesModel->orderBy('created_at', 'DESC')->findAll(5), // Fetch recent 5 sales
            'recentPurchases' => $purchaseModel->orderBy('created_at', 'DESC')->findAll(5), // Fetch recent 5 purchases
            'recentStocks' => $stockModel->orderBy('created_at', 'DESC')->findAll(5), // Fetch recent 5 stocks
        ];

        // Sample data for charts
        $data['sales_labels'] = ["January", "February", "March", "April", "May", "June"];
        $data['sales_data'] = [12, 19, 3, 5, 2, 3];
        $data['purchase_labels'] = ["January", "February", "March", "April", "May", "June"];
        $data['purchase_data'] = [2, 29, 5, 5, 2, 3];

        // Sample data for recent activities and notifications
        $data['recent_activities'] = [
            "Added new stock item 'Widget A'.",
            "Completed sales order #1234.",
            "Received purchase order #5678.",
            "Updated supplier 'Supplier XYZ'."
        ];
        $data['notifications'] = [
            "Low stock alert for 'Widget B'.",
            "New sales order received.",
            "Scheduled maintenance for 'Machine 1'.",
            "Employee 'John Doe' is on leave."
        ];

        $data['css'] = [
            'assets/css/dashboard/main.css'
        ];

        return view('ImsViews/dashboard/index', $data);
    }
}
?>
