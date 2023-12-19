<?php

namespace App\Controllers;
use \App\Models\GunungModel;
use \App\Models\MakananModel;
use \App\Models\JalurModel;
use \App\Models\UserModel;
use \App\Models\RequestDataModel;

class Home extends BaseController
{
    protected $session;
    
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index(): string
    {
        $usermodel = new UserModel;
        $user = $this->session->get("username");
        $gunungModel = new GunungModel(); // Inisialisasi model
        $gunungData = $gunungModel->getGunung();

        $makananModel = new MakananModel(); // Inisialisasi model
        $makananData = $makananModel->getMakanan();

        $data['title'] = 'Halaman Utama';
        $Ag = $this->request->getGet('usia');
        $Wb = $this->request->getGet('berat_badan');
        $Gw = $this->request->getGet('jenis_kelamin');
        $H = $this->request->getGet('ketinggian');
        $s = $this->request->getGet('waktu');
        $Wl = $this->request->getGet('berat_bawaan');

        if (!empty($Wl)) {
        $Wt = $Wb+$Wl;
        $t = $s*60;
        $G = 38;
        $D = ($H/$G)*100;
        $S = sqrt(($H**2)+($D**2));
        $v = $S/$t;
        $Vh = 134;
        $El = 1.44+(1.94*($v**0.43))+(0.24*($v**4))+(0.34*$v*$G)*(1-(1.05**(1-(1.1**($G+32)))));
        $Eu = $Gw*(-55.0969+(0.6309*$Vh)+(0.1988*$Wt)+(0.2017*$Ag))+(1-$Gw)*(-20.4022+(0.4472*$Vh)-(0.1263*$Wt)+(0.74*$Ag));
        $Kalori_Atas = 0.239006*$Eu*$t;
        $Kalori_Bawah = (0.8598*$El*$Wt*$t)/3600;
        }
        else{
            $Kalori_Atas = "";
            $Kalori_Bawah = "";
        }
        return view('layout/header', ['kalori_atas' => $Kalori_Atas, 'kalori_bawah' => $Kalori_Bawah, 'usia' => $Ag, 'berat_badan' => $Wb, 'jenis_kelamin' => $Gw, 'ketinggian' => $H, 'waktu' => $s, 'berat_bawaan' => $Wl, 'gunung'=>$gunungData, 'makanan'=>$makananData]) .
        view('beranda/index.php') .
        view('layout/footer');
    }
    public function jalur($id): string
    {
        $model = new JalurModel();
        $JalurData = $model->getJalur($id);
        $gunungModel = new GunungModel();
        $nama_gunung = $gunungModel->getGunungID($id);
        return view('layout/header') .
        view('content/jalur.php', ['jalur'=> $JalurData,'nama_gunung'=>$nama_gunung]) .
        view('layout/footer');
    }
    public function tambahData(): string
    {
        $gunungModel = new GunungModel(); // Inisialisasi model
        $gunungData = $gunungModel->getGunung();
        $jalurModel = new JalurModel(); // Inisialisasi model
        $jalurData = $jalurModel->getAll();
        if ($jalurData == null){
            $jalurData = "";
        }

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
            'data_peta'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'nama_jalur'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],
            'alamat'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan ketinggian_mdpl Post.'
                ]
            ],       
        ]);


        if(!$validation) {

            return view('layout/header',['validation'=>$this->validator]) .
            view('content/form_content.php',['gunung'=>$gunungData,'jalur'=>$jalurData]) .
            view('layout/footer');
        } else {
            $postModel = new RequestDataModel();
            $gambarGunung = $this->request->getFile('gambar_gunung');
            $fileName = $gambarGunung->getName();

            $postModel->insert([
                'gambar_gunung'   => $fileName,
                'nama_gunung' => $this->request->getPost('nama_gunung'),
                'ketinggian_mdpl' => $this->request->getPost('ketinggian_mdpl'),
                'ketinggian_ft' => $this->request->getPost('ketinggian_ft'),
                'pulau' => $this->request->getPost('pulau'),
                'pos' => $this->request->getPost('pos'),
                'gambar_pos' => $this->request->getPost('gambar_pos'),
                'kebutuhan_kalori' => $this->request->getPost('kebutuhan_kalori'),
                'sumber_mata_air' => $this->request->getPost('sumber_mata_air'),
                'flora_fauna' => $this->request->getPost('flora_fauna'),
                'ketinggian_pos' => $this->request->getPost('ketinggian'),
                'waktu' => $this->request->getPost('waktu'),
                'data_peta' => $this->request->getPost('data_peta'),
                'nama_jalur' => $this->request->getPost('nama_jalur'),
                'alamat' => $this->request->getPost('alamat'),
                'detail' => $this->request->getPost('detail'),
                'status_gunung' => 'request',
                'status_jalur' => 'request',
                'status_pos' => 'request',
            ]);
            //flash message
            $gambarGunung->move('assets/images/', $fileName);
            // $gambarGunung->move('assets/images');
            session()->setFlashdata('message', 'Data Berhasil Disimpan');

            return view('layout/header') .
            view('content/form_content.php',['gunung'=>$gunungData,'jalur'=>$jalurData]) .
            view('layout/footer');
        }
    }

    public function statusgunung(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('layout/header') .
            view('content/status_gunung.php', ['request'=>$requestData]) .
            view('layout/footer');
    }
    public function statusjalur(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('layout/header') .
            view('content/status_jalur.php', ['request'=>$requestData]) .
            view('layout/footer');
    }
    public function statuspos(): string
    {
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();

        return view('layout/header') .
            view('content/status_pos.php', ['request'=>$requestData]) .
            view('layout/footer');
    }

}