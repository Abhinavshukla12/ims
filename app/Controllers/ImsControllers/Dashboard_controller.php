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

class Dashboard_controller extends BaseController
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

        $data = [
            'stocks' => $stockModel->findAll(),
            'sales' => $salesModel->findAll(),
            'purchases' => $purchaseModel->findAll(),
            'items' => $itemModel->findAll(),
            'suppliers' => $supplierModel->findAll(),
            'documents' => $documentModel->findAll(),
            'warehouses' => $warehouseModel->findAll(),
        ];

        return view('ImsViews/dashboard/index', $data);
    }
}
