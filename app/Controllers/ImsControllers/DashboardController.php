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

        // Prepare data for charts based on monthly aggregation for the latest year
        $data['salesByMonth'] = $this->aggregateByMonth($salesModel, 'quantity');
        $data['purchasesByMonth'] = $this->aggregateByMonth($purchaseModel, 'quantity');
        $data['stocksByMonth'] = $this->aggregateByMonth($stockModel, 'quantity');
        $data['itemsByMonth'] = $this->aggregateByMonth($itemModel, 'quantity');

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

    // Helper function to aggregate data by month for the latest year
    private function aggregateByMonth($model, $fieldName)
    {
        $dataByMonth = [];
        $currentDate = new \DateTime();
        $interval = new \DateInterval('P1M');
        $currentDate->modify('first day of this month');

        // Prepare an array of the last 12 months
        for ($i = 0; $i < 12; $i++) {
            $month = $currentDate->format('Y-m');
            $dataByMonth[$month] = 0;
            $currentDate->sub($interval);
        }

        // Fetch data grouped by month
        $data = $model->findAll();

        foreach ($data as $item) {
            $month = date('Y-m', strtotime($item['created_at']));
            if (isset($dataByMonth[$month])) {
                $dataByMonth[$month] += $item[$fieldName];
            }
        }

        // Reverse the array to get the latest months first
        $dataByMonth = array_reverse($dataByMonth, true);

        return $dataByMonth;
    }
}
?>