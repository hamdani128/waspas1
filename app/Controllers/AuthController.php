<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\libraries\Hash;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function register_save()
    {
        $validation = $this->validate([
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Memasukkan Fullname Anda !',
                ],
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Memasukkan Username Anda !',
                    'is_unique' => 'Username ini Sudah Ada !',
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Memasukkan Email Anda !',
                    'is_unique' => 'Email ini Sudah Ada !',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[20]|matches[password]',
                'errors' => [
                    'required' => 'Wajib Mengisi Password',
                    'min_length' => 'Password Anda Harus mininmal 5 Karakter !',
                    'max_length' => 'Password Anda Maksimal 20 Karakter yang Berbeda',
                    'matches' => 'Konfirmasi Password Tidak Bisa Digunakan',
                ],
            ],
        ]);

        if (!$validation) {
            return view('Auth/register', ['validation' => $this->validator]);
        } else {
            $fullname = $this->request->getPost('fullname');
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $values = [
                'fullname' => $fullname,
                'email' => $email,
                'username' => $username,
                'password' => md5($password),
                'image' => 'default.png',
                'level' => 'Admin',
            ];

            $userModel = new UserModel();
            $query = $userModel->insert($values);
            if (!$query) {
                return redirect()->back()->with('fail', 'Registrasi Anda Gagal');
            } else {
                $last_id = $userModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('/');
            }
        }

    }

    public function check()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required|is_not_unique[users.username]',
                'errors' => [
                    'required' => 'Wajib Diisi username Anda !',
                    'is_not_unique' => 'Username Anda Belom Terrigistrasi !',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]|max_length[20]',
                'errors' => [
                    'required' => 'Wajib Mengisi Password !',
                    'min_length' => 'password Minimal 8 Karakter yang Berbeda',
                    'max_length' => 'password maksimal 20 karakter yang Berbeda',
                ],
            ],
        ]);
        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $UserModel = new UserModel();
            $UserInfo = $UserModel->where('username', $username)->first();
            $check_password = md5($password, $UserInfo['password']);

            if (!$check_password) {
                session()->setFlashdata('fail', 'Password Anda Salah ! Silahkan Periksa Kembali');
                return redirect()->to('/auth/login')->withInput();
            } else {
                $user_id = $UserInfo['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/');
            }

        }

    }

    public function logout()
    {
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth/login?access=out')->with('info', 'You Are logged Out');
        }
    }

}