<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Models\StockModel;
use App\Controllers\BaseController;

class stocks extends BaseController
{
    public function index()
    {
        $model = new StockModel();
        $data = [
            'title' => 'Stock List',
            'stocks' => $model->findAll()
        ];
        echo view('ImsViews/inventary_transaction/stocks/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Add Stock'];
        echo view('ImsViews/inventary_transaction/stocks/create', $data);
    }

    public function store()
    {
        $model = new StockModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'price'    => $this->request->getPost('price')
        ];
        $model->insert($data);
        return redirect()->to('ims/stock/');
    }

    public function edit($id)
    {
        $model = new StockModel();
        $data = [
            'title' => 'Edit Stock',
            'stock' => $model->find($id)
        ];
        echo view('ImsViews/inventary_transaction/stocks/edit', $data);
    }

    public function update($id)
    {
        $model = new StockModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'quantity' => $this->request->getPost('quantity'),
            'price'    => $this->request->getPost('price')
        ];
        $model->update($id, $data);
        return redirect()->to('ims/stock/');
    }

    public function delete($id)
    {
        $model = new StockModel();
        $model->delete($id);
        return redirect()->to('ims/stock/');
    }
}