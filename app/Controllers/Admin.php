<?php

namespace App\Controllers;

use \App\Models\GunungModel;
use \App\Models\MakananModel;
use \App\Models\JalurModel;
use \App\Models\PosModel;
use \App\Models\UserModel;
use \App\Models\RequestDataModel;

class Admin extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function halamanadmin(): string
    {
        $gunungModel = new GunungModel();
        $totalGunung = $gunungModel->countTotalGunung();
        $jalurModel = new JalurModel();
        $totalJalur = $jalurModel->countTotalJalur();
        $posModel = new PosModel();
        $totalPos = $posModel->countTotalPos();
        $userModel = new UserModel();
        $totalUser = $userModel->countTotalUser(); // Memanggil metode untuk menghitung total data

        // return view('admin/bar_admin.php').
        return view('admin/beranda_admin.php', ['totalGunung' => $totalGunung, 'totalJalur' => $totalJalur, 'totalPos' => $totalPos, 'totalUser' => $totalUser]);
    }

    public function datagunung(): string
    {
        $gunungModel = new GunungModel();
        $gunungData = $gunungModel->getGunung();
        return view('admin/data_gunung.php', ['gunung' => $gunungData]);
    }
    public function tambahdatagunung(){
        $gunungModel = new GunungModel();
        $gunungData = $gunungModel->getGunung();
        $validation = $this->validate([
            'nama_gunung' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan nama gunung.'
                ]
            ],
            'gambar_gunung' => [
                'rules' => 'uploaded[gambar_gunung]|mime_in[gambar_gunung,image/jpg,image/jpeg,image/png]|max_size[gambar_gunung,2048]',
                'errors' => [
                    'uploaded' => 'Harus Ada File yang diupload',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 2 MB'
                ]
            ],
            'ketinggian_mdpl'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'ketinggian_ft'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'pulau'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
        ]);
        if (!$validation) {
            return redirect()->to(base_url('data-gunung'));
        } else {
            $gambarGunung = $this->request->getFile('gambar_gunung');
            $fileName = $gambarGunung->getName();
            $gunungModel->insert([
                'gambar_gunung'   => $fileName,
                'nama_gunung' => $this->request->getPost('nama_gunung'),
                'ketinggian_mdpl' => $this->request->getPost('ketinggian_mdpl'),
                'ketinggian_ft' => $this->request->getPost('ketinggian_ft'),
                'pulau' => $this->request->getPost('pulau')
            ]);
            //flash message
            $gambarGunung->move('assets/images/', $fileName);
            return redirect()->to(base_url('data-gunung'));
        }
    }

    public function updatedatagunung()
    {
        $gunungModel = new GunungModel();
        $id = $this->request->getPost('id_gunung');
        $gambarGunung = $this->request->getFile('gambar_gunung_' . $id);
        if ($gambarGunung !== null && $gambarGunung->isValid() && $gambarGunung->getSize() < 1000000) {
            $fileName = $gambarGunung->getName();
            $gambarGunung->move('assets/images/', $fileName);
            $newData = [
                'gambar_gunung'   => $fileName,
                'nama_gunung' => $this->request->getPost('nama_gunung'),
                'ketinggian_mdpl' => $this->request->getPost('ketinggian_mdpl'),
                'ketinggian_ft' => $this->request->getPost('ketinggian_ft'),
                'pulau' => $this->request->getPost('pulau')
            ];
        } else {
            $newData = [
                'nama_gunung' => $this->request->getPost('nama_gunung'),
                'ketinggian_mdpl' => $this->request->getPost('ketinggian_mdpl'),
                'ketinggian_ft' => $this->request->getPost('ketinggian_ft'),
                'pulau' => $this->request->getPost('pulau')
            ];
        }
        $gunungModel->where('id_gunung', $id)->set($newData)->update();
        return redirect()->to(base_url('data-gunung'));
    }
    public function datajalur(): string
    {
        $jalurModel = new JalurModel();
        $jalurData = $jalurModel->getAll();

        return view('admin/data_jalur.php', ['jalur' => $jalurData]);
    }

    public function datapos(): string
    {
        $posModel = new PosModel();
        $posData = $posModel->getAll();

        return view('admin/data_pos.php', ['pos' => $posData]);
    }

    public function rekomendasigunung(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_gunung', ['request' => $requestData]);
    }

    public function rekomendasijalur(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_jalur.php', ['request' => $requestData]);
    }

    public function rekomendasipos(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_pos.php', ['request' => $requestData]);
    }

    public function datauser(): string
    {
        $userModel = new UserModel();
        $userData = $userModel->getAll();

        return view('admin/data_user.php', ['user' => $userData]);
    }

    public function datamakanan(): string
    {
        $makananModel = new MakananModel();
        $makananData = $makananModel->getAll();

        return view('admin/data_makanan.php', ['makanan' => $makananData]);
    }

    public function setujuiGunung($id)
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getRequest($id);
        // dd($requestData[0]['nama_gunung']);
        $gunungModel = new GunungModel();

        //insert data into database
        $requestModel->update($id, [
            'status_gunung' => 'disetujui',
        ]);
        // $gambarGunung = $requestData['gambar_gunung'];
        // $nama_gunung = $requestData['nama_gunung'];
        // $ketinggian_mdpl = $requestData['ketinggian_mdpl'];
        // $ketinggian_ft = $requestData['ketinggian_ft'];
        // $pulau = $requestData['pulau'];

        $gunungModel->insert([
            'gambar_gunung' => $requestData[0]['gambar_gunung'],
            'nama_gunung' => $requestData[0]['nama_gunung'],
            'ketinggian_mdpl' => $requestData[0]['ketinggian_mdpl'],
            'ketinggian_ft' => $requestData[0]['ketinggian_ft'],
            'pulau' => $requestData[0]['pulau']
        ]);


        //flash message
        session()->setFlashdata('message', 'Data Gunung Disetujui');

        return redirect()->to(base_url('rekomendasi-gunung'));
    }
    public function tolakGunung($id)
    {
        $validation = $this->validate([
            'alasan_gunung'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan alasan.'
                ]
            ],
        ]);
        if (!$validation) {

            //model initialize
            $requestModel = new RequestDataModel();
            $requestData = $requestModel->getAll();

            //render view with error validation message
            echo ('gagal');
        } else {

            //model initialize
            $requestModel = new RequestDataModel();

            //insert data into database
            $requestModel->update($id, [
                'status_gunung' => 'ditolak',
                'alasan_gunung' => $this->request->getPost('alasan_gunung'),
            ]);

            //flash message
            session()->setFlashdata('message', 'Data Gunung Ditolak');

            return redirect()->to(base_url('rekomendasi-gunung'));
        }
    }

    public function deleteGunung($id)
    {
        $gunungModel = new GunungModel();
        $jalurModel = new JalurModel();
        $relatedJalur = $jalurModel->where('id_gunung', $id)->findAll();
        if ($relatedJalur){
            $jalurModel->where('id_gunung', $id)->delete();
        }
        $deleted = $gunungModel->deleteGunung($id);
        if ($deleted) {
            session()->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-gunung'));
        } else {
            session()->setFlashdata('message', 'Gagal menghapus data');
            return redirect()->to(base_url('data-gunung'));
        }
    }
}
