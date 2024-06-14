<?php

namespace App\Controllers\ImsControllers\Inventary_tracking;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class item_management extends BaseController
{
    public function index()
    {
        $data['js'] = [
            'assets/js/inventary_tracking/item_management/main.js'
        ];
        return view('ImsViews/inventary_tracking/item_management/index',$data);
    }
    // Fetch all data
    public function item_management_data() {
        $model = new ItemModel();
        $data = $model->findAll();
        return $this->response->setJSON($data);
    }

    // Handle CRUD operations
    public function crud_operations() {
        $operation = $this->request->getMethod(true); // Get the request method (POST, PUT, DELETE)
        if ($operation == 'PUT') {
            return $this->edit_user();
        } elseif ($operation == 'DELETE') {
            return $this->delete_user();
        } else {
            return $this->add_user();
        }
    }

    // Add a new 
    public function add_user() {
        $model = new ItemModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing
    public function edit_user() {
        $model = new ItemModel();
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete
    public function delete_user() {
        $model = new ItemModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}