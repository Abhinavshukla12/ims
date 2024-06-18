<?php

namespace App\Controllers\ImsControllers\Inventary_tracking;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class ItemsController extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $data['items'] = $model->findAll();

        return view('ImsViews/inventary_tracking/item_management/index', $data);
    }

    public function create()
    {
        return view('ImsViews/inventary_tracking/item_management/create');
    }

    public function store()
    {
        $model = new ItemModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
        ];

        if (empty($data['name']) || empty($data['price'])) {
            return redirect()->back()->withInput()->with('error', 'Name and Price are required.');
        }

        $model->save($data);

        return redirect()->to('ims/item_management/');
    }

    public function edit($id)
    {
        $model = new ItemModel();
        $data['item'] = $model->find($id);

        return view('ImsViews/inventary_tracking/item_management/edit', $data);
    }

    public function update($id)
    {
        $model = new ItemModel();

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
        ];

        if (empty($data['name']) || empty($data['price'])) {
            return redirect()->back()->withInput()->with('error', 'Name and Price are required.');
        }

        $model->update($id, $data);

        return redirect()->to('ims/item_management');
    }

    public function delete($id)
    {
        $model = new ItemModel();
        $model->delete($id);

        return redirect()->to('ims/item_management/');
    }
}