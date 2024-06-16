<?php

namespace App\Controllers\ImsControllers\WarehouseControllers;

use App\Controllers\BaseController;
use App\Models\WarehouseModel;

class warehouse extends BaseController
{
    public function index()
    {
        $data['js'] = [
            'assets/js/warehouse/main.js'
        ];
        return view('ImsViews/warehouse/index',$data);
    }
    // Fetch all user data
    public function warehouse_data() {
        $model = new WarehouseModel();
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

    // Add a new user
    public function add() {
        $model = new WarehouseModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing user
    public function edit() {
        $model = new WarehouseModel();
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete a user
    public function delete() {
        $model = new WarehouseModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}