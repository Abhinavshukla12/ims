<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;

use App\Models\StockModel;
use App\Models\SalesModel;
use App\Models\PurchaseOrderModel;
use App\Models\ItemModel;

class GraphController extends BaseController
{
    public function stock_graph()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the dashboard.');
        }

        // If user is logged in, fetch stock graph data
        $stockModel = new StockModel();

        // Fetch data for statistics
        $data = [
            'stocks' => $stockModel->findAll()
        ];
        return view('ImsViews/graph/stock_graph_view', $data);
    }

    public function sales_graph()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the dashboard.');
        }

        // If user is logged in, fetch sales graph data
        $salesModel = new SalesModel();

        // Fetch data for statistics
        $data = [
            'sales' => $salesModel->findAll()
        ];
        return view('ImsViews/graph/sales_graph_view', $data);
    }

    public function purchase_graph()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the dashboard.');
        }

        // If user is logged in, fetch purchase graph data
        $purchaseModel = new PurchaseOrderModel();

        // Fetch data for statistics
        $data = [
            'purchases' => $purchaseModel->findAll()
        ];
        return view('ImsViews/graph/purchase_graph_view', $data);
    }

    public function items_graph()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access the dashboard.');
        }

        // If user is logged in, fetch item graph data
        $itemModel = new ItemModel();

        // Fetch data for statistics
        $data = [
            'items' => $itemModel->findAll()
        ];
        return view('ImsViews/graph/items_graph_view', $data);
    }
}