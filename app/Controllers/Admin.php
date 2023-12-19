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
        
        return view('admin/bar_admin.php').
        view('admin/beranda_admin.php', ['totalGunung' => $totalGunung, 'totalJalur' => $totalJalur, 'totalPos' => $totalPos, 'totalUser' => $totalUser]);
    }

    public function datagunung(): string
    {
        $gunungModel = new GunungModel();
        $gunungData = $gunungModel->getGunung();

        return view('admin/data_gunung.php', ['gunung'=>$gunungData]);
    }
    public function datajalur(): string
    {
        $jalurModel = new JalurModel();
        $jalurData = $jalurModel->getAll();

        return view('admin/data_jalur.php', ['jalur'=>$jalurData]);
    }
    
    public function datapos(): string
    {
        $posModel = new PosModel();
        $posData = $posModel->getAll();

        return view('admin/data_pos.php', ['pos'=>$posData]);
    }
    
    public function rekomendasigunung(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_gunung', ['request'=>$requestData]);
    }

    public function rekomendasijalur(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_jalur.php', ['request'=>$requestData]);
    }
    
    public function rekomendasipos(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('admin/rekomendasi_pos.php', ['request'=>$requestData]);
    }

    public function datauser(): string
    {
        $userModel = new UserModel();
        $userData = $userModel->getAll();

        return view('admin/data_user.php', ['user'=>$userData]);
    }

    public function datamakanan(): string
    {
        $makananModel = new MakananModel();
        $makananData = $makananModel->getAll();

        return view('admin/data_makanan.php', ['makanan'=>$makananData]);
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
        if(!$validation) {

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

    // Contoh di UserController.php (controller)
    public function deleteGunung($id)
    {
    $gunungModel = new GunungModel(); 
    $deleted = $gunungModel->deleteGunung($id); 

    if ($deleted) {
        // Data berhasil dihapus
        // echo "Data berhasil dihapus.";
        session()->setFlashdata('message', 'Data berhasil dihapus');

        return redirect()->to(base_url('data-gunung'));
    } else {
        // Gagal menghapus data
        // echo "Gagal menghapus data.";
        session()->setFlashdata('message', 'Gagal menghapus data');

        return redirect()->to(base_url('data-gunung'));
    }
    }

}