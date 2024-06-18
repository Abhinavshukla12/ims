<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class SuppliersController extends BaseController
{
    public function index()
    {
        $model = new SupplierModel();
        $data['suppliers'] = $model->findAll();

        return view('ImsViews/suppliers/index', $data);
    }

    public function create()
    {
        return view('ImsViews/suppliers/create');
    }

    public function store()
    {
        $model = new SupplierModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'contact' => $this->request->getPost('contact'),
            'address' => $this->request->getPost('address'),
        ];

        if (empty($data['name'])) {
            return redirect()->back()->withInput()->with('error', 'Name is required.');
        }

        if ($model->insert($data) === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to save supplier.');
        }

        return redirect()->to('ims/suppliers/');
    }

    public function edit($id)
    {
        $model = new SupplierModel();
        $data['supplier'] = $model->find($id);

        return view('ImsViews/suppliers/edit', $data);
    }

    public function update($id)
    {
        $model = new SupplierModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'contact'     => $this->request->getPost('contact'),
            'address'     => $this->request->getPost('address'),
        ];

        if (empty($data['name'])) {
            return redirect()->back()->withInput()->with('error', 'Name is required.');
        }

        $model->update($id, $data);

        return redirect()->to('ims/suppliers/');
    }

    public function delete($id)
    {
        $model = new SupplierModel();
        $model->delete($id);

        return redirect()->to('ims/suppliers/');
    }
}
