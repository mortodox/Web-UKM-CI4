<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function process()
    {
        $userModel = new UserModel();
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user && $password === $user['password']) {
            session()->set([
                'user_id' => $user['id'],
                'user_name' => $user['nama'],
                'is_logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        session()->destroy(); // Hapus semua session
        session()->setFlashdata('message', 'Anda berhasil logout.');

        return redirect()->to('/'); // Arahkan ke halaman utama publik
    }
}
