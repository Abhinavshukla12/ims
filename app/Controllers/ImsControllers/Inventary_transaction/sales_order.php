<?php

namespace App\Controllers\ImsControllers\Inventary_transaction;

use App\Controllers\BaseController;
use App\Models\SalesOrderModel;

class sales_order extends BaseController
{
    public function index()
    {
        $data['js'] = [
            'assets/js/inventary_transaction/sales_order/main.js'
        ];
        return view('ImsViews/inventary_transaction/sales_order/index',$data);
    }
    // Fetch all user data
    public function sales_order_data() {
        $model = new SalesOrderModel();
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
        $model = new SalesOrderModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing user
    public function edit_user() {
        $model = new SalesOrderModel();
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete a user
    public function delete_user() {
        $model = new SalesOrderModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}