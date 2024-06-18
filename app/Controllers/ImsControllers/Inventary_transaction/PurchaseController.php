<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Models\PurchaseOrderModel;
use App\Controllers\BaseController;

class PurchaseController extends BaseController
{
    public function index()
    {
        $model = new PurchaseOrderModel();
        $data['purchase_orders'] = $model->findAll();

        return view('ImsViews/inventary_transaction/purchase_order/index', $data);
    }

    public function create()
    {
        return view('ImsViews/inventary_transaction/purchase_order/create');
    }

    public function store()
    {
        $model = new PurchaseOrderModel();

        $data = [
            'supplier_id' => $this->request->getPost('supplier_id'),
            'name'        => $this->request->getPost('name'),
            'order_date'  => $this->request->getPost('order_date'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ];

        if (empty($data['supplier_id']) || empty($data['name']) || empty($data['order_date']) || empty($data['quantity']) || empty($data['price'])) {
            return redirect()->back()->withInput()->with('error', 'All fields are required.');
        }

        $model->save($data);

        return redirect()->to('ims/purchase_order/');
    }

    public function edit($id)
    {
        $model = new PurchaseOrderModel();
        $data['purchase_order'] = $model->find($id);

        return view('ImsViews/inventary_transaction/purchase_order/edit', $data);
    }

    public function update($id)
    {
        $model = new PurchaseOrderModel();

        $data = [
            'supplier_id' => $this->request->getPost('supplier_id'),
            'name'        => $this->request->getPost('name'),
            'order_date'  => $this->request->getPost('order_date'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ];

        if (empty($data['supplier_id']) || empty($data['name']) || empty($data['order_date']) || empty($data['quantity']) || empty($data['price'])) {
            return redirect()->back()->withInput()->with('error', 'All fields are required.');
        }

        $model->update($id, $data);

        return redirect()->to('ims/purchase_order/');
    }
}
