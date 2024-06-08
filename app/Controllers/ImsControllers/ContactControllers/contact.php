<?php

namespace App\Controllers\ImsControllers\ContactControllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class contact extends BaseController
{
    public function index()
    {
        $data['css'] = [
            'assets/css/contact/main.css'
        ];
        return view('ImsViews/contact/index', $data);
    }
    public function submit()
    {
        $model = new ContactModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];

        if ($model->insert($data)) {
            return redirect()->to('ims/contact');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function success()
    {
        return view('ImsViews/contact/contact_success');
    }
}
