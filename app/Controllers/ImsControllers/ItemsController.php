<?php

namespace App\Controllers\ImsControllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class ItemsController extends BaseController
{
    // View
    public function jqgrid()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return redirect()->to(site_url('ims/login'))->with('error', 'Please login to access item management.');
        }

        $data['css'] = [
            'node_modules/jquery-ui/dist/themes/base/jquery-ui.min.css',
            'node_modules/free-jqgrid/dist/css/ui.jqgrid.min.css',
            'node_modules/free-jqgrid/dist/plugins/css/ui.multiselect.min.css'
        ];
        $data['js'] = [
            'node_modules/free-jqgrid/dist/jquery.jqgrid.min.js',
            'assets/js/item_management/main.js'
        ];
        return view('ImsViews/item_management/jqgrid', $data);
    }

    // Fetch all item data with support for jqGrid search
    public function item_data()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return $this->response->setJSON(['error' => 'Please login to access item data.']);
        }

        $model = new ItemModel();

        // Get jqGrid parameters
        $page = $this->request->getVar('page', FILTER_VALIDATE_INT) ?: 1;
        $limit = $this->request->getVar('rows', FILTER_VALIDATE_INT) ?: 20;
        $sidx = $this->request->getVar('sidx') ?: 'item_id';
        $sord = $this->request->getVar('sord') ?: 'asc';
        $search = $this->request->getVar('_search') == 'true';

        // Build the query with sorting
        $model->orderBy($sidx, $sord);

        // Handle search filters
        if ($search) {
            $filters = json_decode($this->request->getVar('filters'), true);
            if (isset($filters['rules']) && is_array($filters['rules'])) {
                foreach ($filters['rules'] as $rule) {
                    $model->like($rule['field'], $rule['data']);
                }
            }
        }

        // Get the count of all records (for pagination)
        $count = $model->countAllResults(false);
        $total_pages = $count > 0 ? ceil($count / $limit) : 0;
        $page = min($page, $total_pages);
        $start = max(0, ($page - 1) * $limit);

        // Get the actual data
        $model->limit($limit, $start);
        $data = $model->findAll();

        // Prepare the response
        $response = [
            'page' => $page,
            'total' => $total_pages,
            'records' => $count,
            'rows' => $data
        ];

        return $this->response->setJSON($response);
    }

    // Handle CRUD operations
    public function crud_operations()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return $this->response->setJSON(['error' => 'Please login to perform CRUD operations on items.']);
        }

        $operation = $this->request->getMethod(true); // Get the request method (POST, PUT, DELETE)
        switch ($operation) {
            case 'PUT':
                return $this->edit();
            case 'DELETE':
                return $this->delete();
            default:
                return $this->add();
        }
    }

    // Add a new item
    public function add()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return $this->response->setJSON(['error' => 'Please login to add items.']);
        }

        $model = new ItemModel();
        $data = $this->request->getPost();
        
        if ($model->insert($data) === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => $model->errors()]);
        }

        return $this->response->setJSON(['status' => 'success', 'id' => $model->insertID()]);
    }

    // Edit an existing item
    public function edit()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return $this->response->setJSON(['error' => 'Please login to edit items.']);
        }

        $model = new ItemModel();
        $id = $this->request->getVar('item_id');
        $data = $this->request->getPost();
        
        if ($model->update($id, $data) === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => $model->errors()]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete an item
    public function delete()
    {
        // Check if user is logged in
        if (!session()->has('user')) {
            return $this->response->setJSON(['error' => 'Please login to delete items.']);
        }

        $model = new ItemModel();
        $id = $this->request->getVar('item_id');
        
        if ($model->delete($id) === false) {
            return $this->response->setJSON(['status' => 'error', 'message' => $model->errors()]);
        }

        return $this->response->setJSON(['status' => 'success']);
    }
}
