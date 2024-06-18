<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Models\SalesModel;
use App\Controllers\BaseController;

class sales_order extends BaseController
{
    public function index()
    {
        $model = new SalesModel();
        $data = [
            'title' => 'Sales List',
            'sales' => $model->findAll()
        ];
        echo view('ImsViews/inventary_transaction/sales_order/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add Sales'];
        echo view('ImsViews/inventary_transaction/sales_order/create', $data);
    }

    public function store()
    {
        $model = new SalesModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'price'    => $this->request->getPost('price')
        ];
        $model->insert($data);
        return redirect()->to('ims/sales_order/');
    }

    public function edit($order_id)
    {
        $model = new SalesModel();
        $data = [
            'title' => 'Edit Sales',
            'sales' => $model->find($order_id)
        ];
        echo view('ImsViews/inventary_transaction/sales_order/edit', $data);
    }

    public function update($order_id)
    {
        $model = new SalesModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'price'    => $this->request->getPost('price')
        ];
        $model->update($order_id, $data);
        return redirect()->to('ims/sales_order/');
    }

    public function delete($order_id)
    {
        $model = new SalesModel();
        $model->delete($order_id);
        return redirect()->to('ims/sales_order/');
    }
}