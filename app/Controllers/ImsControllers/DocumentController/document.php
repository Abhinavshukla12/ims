<?php

namespace App\Controllers\ImsControllers\DocumentController;

use App\Controllers\BaseController;
use App\Models\DocumentModel;

class document extends BaseController
{
    public function index()
    {
        $data['js'] = [
            'assets/js/document/main.js'
        ];
        return view('ImsViews/document/index',$data);
    }
    // Fetch all user data
    public function document_data() {
        $model = new DocumentModel();
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
        $model = new DocumentModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing user
    public function edit() {
        $model = new DocumentModel();
        $id = $this->request->getPost('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete a user
    public function delete() {
        $model = new DocumentModel();
        $id = $this->request->getPost('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}