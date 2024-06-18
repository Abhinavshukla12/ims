<?php

namespace App\Controllers\ImsControllers;

use App\Models\SalesModel;
use App\Controllers\BaseController;

class sales_order extends BaseController
{
    public function index()
    {
        $model = new SalesModel();
        $data['sales'] = $model->findAll();

        return view('ImsViews/sales_order/index', $data);
    }

    public function create()
    {
        return view('ImsViews/sales_order/create');
    }

    public function store()
    {
        $model = new SalesModel();

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'name'        => $this->request->getPost('name'),
            'order_date'  => $this->request->getPost('order_date'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ];

        $model->save($data);

        return redirect()->to('ims/sales');
    }

    public function edit($id)
    {
        $model = new SalesModel();
        $data['sale'] = $model->find($id);

        return view('ImsViews/sales_order/edit', $data);
    }

    public function update($id)
    {
        $model = new SalesModel();

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'name'        => $this->request->getPost('name'),
            'order_date'  => $this->request->getPost('order_date'),
            'quantity'    => $this->request->getPost('quantity'),
            'price'       => $this->request->getPost('price'),
        ];

        $model->update($id, $data);

        return redirect()->to('ims/sales');
    }

    public function delete($id)
    {
        $model = new SalesModel();
        $model->delete($id);

        return redirect()->to('ims/sales');
    }
}