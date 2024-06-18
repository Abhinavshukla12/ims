<?php

namespace App\Controllers\ImsControllers;

use App\Models\DocumentModel;
use CodeIgniter\Controller;

class DocumentsController extends Controller
{
    public function index()
    {
        $model = new DocumentModel();
        $data['documents'] = $model->findAll();

        return view('ImsViews/documents/index', $data);
    }

    public function create()
    {
        return view('ImsViews/documents/create');
    }

    public function store()
    {
        $model = new DocumentModel();
        $file = $this->request->getFile('file');

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'file_path'   => $file ? $file->store() : null,
        ];

        if (empty($data['title'])) {
            return redirect()->back()->withInput()->with('error', 'Title is required.');
        }

        if ($model->insert($data) === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to save document.');
        }

        return redirect()->to('ims/document/');
    }

    public function edit($id)
    {
        $model = new DocumentModel();
        $data['document'] = $model->find($id);

        return view('ImsViews/documents/edit', $data);
    }

    public function update($id)
    {
        $model = new DocumentModel();
        $file = $this->request->getFile('file');

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];

        if ($file && $file->isValid()) {
            $data['file_path'] = $file->store();
        }

        if (empty($data['title'])) {
            return redirect()->back()->withInput()->with('error', 'Title is required.');
        }

        if ($model->update($id, $data) === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update document.');
        }

        return redirect()->to('ims/document/');
    }

    public function delete($id)
    {
        $model = new DocumentModel();
        $model->delete($id);

        return redirect()->to('ims/document/');
    }
}