<?php

namespace App\Controllers\ImsControllers;

use App\Models\SalesModel;
use App\Controllers\BaseController;

class sales_order extends BaseController
{
    // View
    public function jqgrid()
    {
        $data['css'] = [
            'node_modules/jquery-ui/dist/themes/base/jquery-ui.min.css',
            'node_modules/free-jqgrid/dist/css/ui.jqgrid.min.css',
            'node_modules/free-jqgrid/dist/plugins/css/ui.multiselect.min.css'
        ];
        $data['js'] = [
            'node_modules/free-jqgrid/dist/jquery.jqgrid.min.js',
            'assets/js/sales_order/main.js'
        ];
        return view('ImsViews/sales_order/jqgrid', $data);
    }

    // Fetch all sales data with support for jqGrid search
    public function sales_data()
    {
        $model = new SalesModel();

        // Get jqGrid parameters
        $page = $this->request->getVar('page', FILTER_VALIDATE_INT) ?: 1;
        $limit = $this->request->getVar('rows', FILTER_VALIDATE_INT) ?: 20;
        $sidx = $this->request->getVar('sidx') ?: 'order_id';
        $sord = $this->request->getVar('sord') ?: 'asc';
        $search = $this->request->getVar('_search') == 'true';

        $model->orderBy($sidx, $sord);

        if ($search) {
            $filters = json_decode($this->request->getVar('filters'), true);
            if (isset($filters['rules']) && is_array($filters['rules'])) {
                foreach ($filters['rules'] as $rule) {
                    $model->like($rule['field'], $rule['data']);
                }
            }
        }

        $count = $model->countAllResults(false);
        $total_pages = $count > 0 ? ceil($count / $limit) : 0;
        $page = min($page, $total_pages);
        $start = max(0, ($page - 1) * $limit);

        $model->limit($limit, $start);
        $data = $model->findAll();

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
        $operation = $this->request->getMethod(true); // Get the request method (POST, PUT, DELETE)
        if ($operation == 'PUT') {
            return $this->edit();
        } elseif ($operation == 'DELETE') {
            return $this->delete();
        } else {
            return $this->add();
        }
    }

    // Add a new sales order
    public function add()
    {
        $model = new SalesModel();
        $data = $this->request->getPost();
        $model->insert($data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Edit an existing sales order
    public function edit()
    {
        $model = new SalesModel();
        $id = $this->request->getVar('id');
        $data = $this->request->getPost();
        $model->update($id, $data);
        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete a sales order
    public function delete()
    {
        $model = new SalesModel();
        $id = $this->request->getVar('id');
        $model->delete($id);
        return $this->response->setJSON(['status' => 'success']);
    }
}
