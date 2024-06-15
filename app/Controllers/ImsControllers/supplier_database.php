<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class supplier_database extends BaseController
{
    public function index()
    {
        $data['js'] = [
            'assets/js/supplier_database/main.js'
        ];
        return view('ImsViews/supplier_database/index',$data);
    }
    // Fetch all user data
    public function supplier_database_data() {
        $model = new SupplierModel();
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
    public function add_user() {
        $model = new SupplierModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing user
    public function edit_user() {
        $model = new SupplierModel();
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete a user
    public function delete_user() {
        $model = new SupplierModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}