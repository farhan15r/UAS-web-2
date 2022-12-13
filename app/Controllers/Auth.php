<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function register()
    {
        $data = [
            'title' => 'Register | RentCar',
        ];

        return view('register', $data);
    }

    public function register_post()
    {
        $username = $this->request->getVar('username');
        $name = $this->request->getVar('name');
        $address = $this->request->getVar('address');
        $nik = $this->request->getVar('nik');
        $no_tlp = $this->request->getVar('no_tlp');
        $password = $this->request->getVar('password');

        $rules = [
            'username' => 'required|is_unique[users.username]',
            'name' => 'required',
            'address' => 'required',
            'nik' => 'required|is_unique[users.nik]',
            'no_tlp' => 'required|is_unique[users.no_tlp]',
            'password' => 'required|min_length[8]',
            'password_confirmation' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        } else {
            $data = [
                'username' => $username,
                'name' => $name,
                'address' => $address,
                'nik' => $nik,
                'no_tlp' => $no_tlp,
                'password' => sha1($password),
            ];

            $this->UsersModel->insert($data);

            session()->setFlashdata('success', 'Register Success');
            return redirect()->to('/login')->with('success', 'Register Success, Please Login!');
        }
    }

    public function login()
    {
        $data = [
            'title' => 'Login | RentCar',
        ];

        return view('login', $data);
    }

    public function login_post()
    {
        //ambil data dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        //aturan validasi
        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[5]',
        ];

        //jika validasi gagal
        if (!$this->validate($rules)) {
            return redirect()->back()->with('validation', $this->validator);

            //jika validasi sukses
        } else {

            //check username & password enkripsi terdaftar di database
            $encrypt_password = sha1($password);
            $data = $this->UsersModel->select()->where('username', $username)->where('password', $encrypt_password)->first();

            if ($data) {
                //membuat session
                session()->set([
                    'username' => $data['username'],
                    'is_login' => TRUE,
                    'is_admin' => $data['is_admin']
                ]);

                return redirect()->to('/');
            } else {
                return redirect()->route('login')->with('error', 'Invalid login');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
