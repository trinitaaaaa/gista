<?php

namespace App\Controllers;
use \App\Models\GunungModel;
use \App\Models\UserModel;
class Auth extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function login() {
        return view('login');
        
    }
    public function login_proses() {
        // $session = session();
        $users = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userData = $users->getUserByUsername($username);
        $cek = $users->get_data($username, $password);
        if ($cek && isset($cek['username']) && isset($cek['password'])) {
            if (($username == $cek['username']) && ($password == $cek['password'] ))
            {
                if ($cek['role']=='Admin'){
                    session()->set('username', $cek['username']);
                    return redirect()->to(base_url('halaman-admin'));
                }
                else{
                    session()->set('username', $cek['username']);
                    return redirect()->to(base_url());
                }
                
            } else {
                $session = session();
                session()->setFlashdata('pesan', 'Username atau Password Salah');
                return redirect()->to(base_url('login'));
            }
        }else{
            $session = session();
            session()->setFlashdata('pesan', 'Data tidak ditemukan');
            return redirect()->to(base_url('login'));
        }
        
    }
    function logout() {
		$session = session();
		
        // $session->set(array('username' => '', 'logged_in' => ''));
        $session->destroy();
        return redirect()->to(base_url());
    }
	
    public function register() {

        $validation = $this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan nama gunung.'
                ]
            ],
            'username'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'email'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'password'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
         
        ]);

        if(!$validation) {
            return view('register');        
        } else {
            $postModel = new UserModel();
            $password =  $this->request->getPost('password');
            $repeatpassword =  $this->request->getPost('repeatpassword');
            $username = $this->request->getPost('username');
            $userData = $postModel->getUserByUsername($username);
            // $cek = $postModel->get_data($username, $password);
            if (!isset($userData)) {
                if ($password === $repeatpassword) {
                    $postModel->insert([
                    'nama' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                    'role' => 'penginput',
            ]);
                }else {
                $session = session();
                $session->setFlashdata('error', 'Password dan Ulangi Password tidak cocok. Silakan periksa kembali.');
                return view('register');}
            }else{
                $session = session();
                $session->setFlashdata('error', 'Username sudah terdaftar.');
                return view('register');
            }
            
            $session = session();
            session()->setFlashdata('pesan', 'Data Berhasil Disimpan');
            return redirect()->to(base_url('login'));
        }
    }
}