<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login');
    }

    public function login()
    {
        $model = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $model->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            session()->set([
                'admin_id'        => $admin['id'],
                'admin_nama'      => $admin['nama'],
                'admin_logged_in' => true,
            ]);
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
