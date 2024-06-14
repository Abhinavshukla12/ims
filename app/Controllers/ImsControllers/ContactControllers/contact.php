<?php

namespace App\Controllers\ImsControllers\ContactControllers;

use App\Controllers\BaseController;
use App\Models\ContactModel;

class contact extends BaseController
{
    public function index()
    {
        return view('ImsViews/contact/index');
    }
    public function submit()
    {
        $model = new ContactModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ];

        if ($model->save($data)) {
            return redirect()->to('ims/contact')->with('success', 'Your message has been sent successfully.');
        } else {
            return redirect()->to('ims/contact')->with('error', 'Failed to send your message.');
        }
    }
}
