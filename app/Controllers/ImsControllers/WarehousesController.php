<?php

namespace App\Controllers\ImsControllers;

use App\Models\WarehouseModel;
use CodeIgniter\Controller;

class WarehousesController extends Controller
{
    public function index()
    {
        $model = new WarehouseModel();
        $data['warehouses'] = $model->findAll();

        return view('ImsViews/warehouses/index', $data);
    }

    public function create()
    {
        return view('ImsViews/warehouses/create');
    }

    public function store()
    {
        $model = new WarehouseModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'capacity' => $this->request->getPost('capacity'),
        ];

        if (empty($data['name'])) {
            return redirect()->back()->withInput()->with('error', 'Name is required.');
        }

        if ($model->insert($data) === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to save warehouse.');
        }

        return redirect()->to('ims/warehouse/');
    }

    public function edit($id)
    {
        $model = new WarehouseModel();
        $data['warehouse'] = $model->find($id);

        return view('ImsViews/warehouses/edit', $data);
    }

    public function update($id)
    {
        $model = new WarehouseModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'capacity' => $this->request->getPost('capacity'),
        ];

        if (empty($data['name'])) {
            return redirect()->back()->withInput()->with('error', 'Name is required.');
        }

        if ($model->update($id, $data) === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update warehouse.');
        }

        return redirect()->to('ims/warehouse/');
    }

    public function delete($id)
    {
        $model = new WarehouseModel();
        $model->delete($id);

        return redirect()->to('ims/warehouse/');
    }
}