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
    #DATA GUNUNG
    public function datagunung(): string
    {
        $gunungModel = new GunungModel();
        $gunungData = $gunungModel->getGunung();
        return view('admin/data_gunung.php', ['gunung' => $gunungData]);
    }
    public function tambahdatagunung()
    {
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
        if ($gambarGunung !== null && $gambarGunung->isValid() && $gambarGunung->getSize() < 10000000) {
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
    public function deleteGunung($id)
    {
        $gunungModel = new GunungModel();
        $jalurModel = new JalurModel();
        $relatedJalur = $jalurModel->where('id_gunung', $id)->findAll();
        if ($relatedJalur) {
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
    #DATA JALUR
    public function datajalur(): string
    {
        $jalurModel = new JalurModel();
        $jalurData = $jalurModel->getAll();
        $gunungModel = new GunungModel();
        $gunungData = $gunungModel->getGunung();
        return view('admin/data_jalur.php', ['jalur' => $jalurData, 'gunung' => $gunungData]);
    }
    public function tambahdatajalur()
    {
        $jalurModel = new JalurModel();
        $jalurModel->insert([
            'data_peta' => $this->request->getPost('data_peta'),
            'nama_jalur' => $this->request->getPost('nama_jalur'),
            'alamat' => $this->request->getPost('alamat'),
            'detail' => $this->request->getPost('detail'),
            'id_gunung' => $this->request->getPost('id_gunung')
        ]);
        return redirect()->to(base_url('data-jalur'));
    }
    public function updatedatajalur()
    {
        $jalurModel = new JalurModel();
        $id = $this->request->getPost('id_jalur');
        $newData = [
            'data_peta' => $this->request->getPost('data_peta'),
            'nama_jalur' => $this->request->getPost('nama_jalur'),
            'alamat' => $this->request->getPost('alamat'),
            'detail' => $this->request->getPost('detail'),
            'id_gunung' => $this->request->getPost('id_gunung')
        ];
        $jalurModel->where('id_jalur', $id)->set($newData)->update();
        return redirect()->to(base_url('data-jalur'));
    }
    public function deleteJalur($id)
    {
        $jalurModel = new JalurModel();
        $deleted = $jalurModel->deleteJalur($id);
        if ($deleted) {
            session()->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-jalur'));
        } else {
            session()->setFlashdata('message', 'Gagal menghapus data');
            return redirect()->to(base_url('data-jalur'));
        }
    }
    #DATA POS
    public function datapos(): string
    {
        $posModel = new PosModel();
        $posData = $posModel->getAll();
        $jalurModel = new JalurModel();
        $jalurData = $jalurModel->getAll();
        return view('admin/data_pos.php', ['pos' => $posData, 'jalur' => $jalurData]);
    }
    public function tambahdatapos()
    {
        $gambarPos = $this->request->getFile('gambar_pos');
        $fileName = $gambarPos->getName();
        $posModel = new PosModel();
        $posModel->insert([
            'pos' => $this->request->getPost('pos'),
            'gambar_pos' => $fileName,
            'kebutuhan_kalori' => $this->request->getPost('kebutuhan_kalori'),
            'sumber_mata_air' => $this->request->getPost('sumber_mata_air'),
            'flora_fauna' => $this->request->getPost('flora_fauna'),
            'ketinggian_pos' => $this->request->getPost('ketinggian_pos'),
            'waktu' => $this->request->getPost('waktu'),
            'id_jalur' => $this->request->getPost('id_jalur')
        ]);
        $gambarPos->move('assets/images/', $fileName);
        return redirect()->to(base_url('data-pos'));
    }
    public function updatedatapos()
    {
        $posModel = new PosModel();
        $id = $this->request->getPost('id_pos');
        $gambarPos = $this->request->getFile('gambar_pos_' . $id);
        if ($gambarPos !== null && $gambarPos->isValid() && $gambarPos->getSize() < 10000000) {
            $fileName = $gambarPos->getName();
            $gambarPos->move('assets/images/', $fileName);
            $newData = [
                'pos' => $this->request->getPost('pos'),
                'gambar_pos' => $fileName,
                'kebutuhan_kalori' => $this->request->getPost('kebutuhan_kalori'),
                'sumber_mata_air' => $this->request->getPost('sumber_mata_air'),
                'flora_fauna' => $this->request->getPost('flora_fauna'),
                'ketinggian_pos' => $this->request->getPost('ketinggian_pos'),
                'waktu' => $this->request->getPost('waktu'),
                'id_jalur' => $this->request->getPost('id_jalur')
            ];
        } else {
            $newData = [
                'pos' => $this->request->getPost('pos'),
                'kebutuhan_kalori' => $this->request->getPost('kebutuhan_kalori'),
                'sumber_mata_air' => $this->request->getPost('sumber_mata_air'),
                'flora_fauna' => $this->request->getPost('flora_fauna'),
                'ketinggian_pos' => $this->request->getPost('ketinggian_pos'),
                'waktu' => $this->request->getPost('waktu'),
                'id_jalur' => $this->request->getPost('id_jalur')
            ];
        }
        $posModel->where('id_pos', $id)->set($newData)->update();
        return redirect()->to(base_url('data-pos'));
    }
    public function deletepos($id)
    {
        $posModel = new PosModel();
        $deleted = $posModel->deletePos($id);
        if ($deleted) {
            session()->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-pos'));
        } else {
            session()->setFlashdata('message', 'Gagal menghapus data');
            return redirect()->to(base_url('data-pos'));
        }
    }
    #DATA REKOMENDASI
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
        $requestModel = new RequestDataModel();
        $requestData = $requestModel->getAll();
        $alasan = $this->request->getJSON();
        if ($alasan !== Null) {
            $dataalasan = $alasan->message;
            $requestModel->update($id, [
                'status_gunung' => 'ditolak',
                'alasan_gunung' => $dataalasan,
            ]);
            session()->setFlashdata('message', 'Data Gunung Ditolak');
            return redirect()->to(base_url('rekomendasi-gunung'));
        }
    }
    public function setujuiJalur($id)
    {
        $requestModel = new RequestDataModel();
        $gunungModel = new GunungModel();
        $jalurModel = new JalurModel();
        $requestData = $requestModel->getRequest($id);
        $namaGunung =  $requestData[0]['nama_gunung'];
        $id_gunung = $gunungModel->getGunungName($namaGunung);
        if ($id_gunung !== Null) {
            $requestModel->update($id, [
                'status_jalur' => 'disetujui',
            ]);
            $jalurModel->insert([
                'data_peta' => $requestData[0]['data_peta'],
                'nama_jalur' => $requestData[0]['nama_jalur'],
                'alamat' => $requestData[0]['alamat'],
                'detail' => $requestData[0]['detail'],
                'id_gunung' => $id_gunung
            ]);
            // session()->setFlashdata('message-berhasil', 'Data Jalur Disetujui');
            return redirect()->to(base_url('rekomendasi-jalur'));
        } else {
            session()->setFlashdata('message', 'Data Jalur tidak dapat disetujui Karena Gunung belum terdaftar');
            return redirect()->to(base_url('rekomendasi-jalur'));
        }
    }
    public function tolakJalur($id)
    {
        $requestModel = new RequestDataModel();
        $alasan = $this->request->getJSON();
        if ($alasan !== Null) {
            $dataalasan = $alasan->message;
            $requestModel->update($id, [
                'status_jalur' => 'ditolak',
                'alasan_jalur' => $dataalasan,
            ]);
            // session()->setFlashdata('message-berhasil', 'Data Jalur Ditolak');
            return redirect()->to(base_url('rekomendasi-jalur'));
        }
    }
    public function setujuiPos($id)
    {
        $requestModel = new RequestDataModel();
        $jalurModel = new JalurModel();
        $posModel = new PosModel();
        $requestData = $requestModel->getRequest($id);
        $namaJalur =  $requestData[0]['nama_jalur'];
        $id_jalur = $jalurModel->getJalurName($namaJalur);
        echo  $id_jalur;
        if ($id_jalur !== Null) {
            $requestModel->update($id, [
                'status_pos' => 'disetujui',
            ]);
            $posModel->insert([
                'pos' => $requestData[0]['pos'],
                'gambar_pos' => $requestData[0]['gambar_pos'],
                'kebutuhan_kalori' => $requestData[0]['kebutuhan_kalori'],
                'sumber_mata_air' => $requestData[0]['sumber_mata_air'],
                'flora_fauna' => $requestData[0]['flora_fauna'],
                'ketinggian_pos' => $requestData[0]['ketinggian_pos'],
                'waktu' => $requestData[0]['waktu'],
                'id_jalur' => $id_jalur
            ]);
            return redirect()->to(base_url('rekomendasi-pos'));
        } else {
            session()->setFlashdata('message', 'Data Pos tidak dapat disetujui Karena Pos belum terdaftar');
            return redirect()->to(base_url('rekomendasi-pos'));
        }
    }
    public function tolakPos($id)
    {
        $requestModel = new RequestDataModel();
        $alasan = $this->request->getJSON();
        if ($alasan !== Null) {
            $dataalasan = $alasan->message;
            $requestModel->update($id, [
                'status_pos' => 'ditolak',
                'alasan_pos' => $dataalasan,
            ]);
            // session()->setFlashdata('message-berhasil', 'Data Jalur Ditolak');
            return redirect()->to(base_url('rekomendasi-jalur'));
        }
    }
    #DATA MAKANAN
    public function datamakanan(): string
    {
        $makananModel = new MakananModel();
        $makananData = $makananModel->getAll();

        return view('admin/data_makanan.php', ['makanan' => $makananData]);
    }
    public function tambahDataMakanan()
    {
        $gambarMakanan = $this->request->getFile('gambar');
        $fileName = $gambarMakanan->getName();
        $MakananModel = new MakananModel();
        $MakananModel->insert([
            'gambar' => $fileName,
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'kalori' => $this->request->getPost('kalori'),
        ]);
        $gambarMakanan->move('assets/images/', $fileName);
        return redirect()->to(base_url('data-makanan'));
    }
    public function updateDataMakanan()
    {
        $MakananModel = new MakananModel();
        $id = $this->request->getPost('id_makanan');
        $gambarMakanan = $this->request->getFile('gambar_makanan_' . $id);
        if ($gambarMakanan !== null && $gambarMakanan->isValid() && $gambarMakanan->getSize() < 10000000) {
            $fileName = $gambarMakanan->getName();
            $gambarMakanan->move('assets/images/', $fileName);
            $newData = [
                'gambar' => $fileName,
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'kalori' => $this->request->getPost('kalori'),
            ];
        } else {
            $newData = [
                'nama' => $this->request->getPost('nama'),
                'alamat' => $this->request->getPost('alamat'),
                'kalori' => $this->request->getPost('kalori'),
            ];
        }
        $MakananModel->where('id_makanan', $id)->set($newData)->update();
        return redirect()->to(base_url('data-makanan'));
    }
    public function deleteMakanan($id)
    {
        $MakananModel = new MakananModel();
        $deleted = $MakananModel->deleteMakanan($id);
        if ($deleted) {
            session()->setFlashdata('message', 'Data berhasil dihapus');
            return redirect()->to(base_url('data-makanan'));
        } else {
            session()->setFlashdata('message', 'Gagal menghapus data');
            return redirect()->to(base_url('data-makanan'));
        }
    }
    #DATA USER
    public function datauser(): string
    {
        $userModel = new UserModel();
        $userData = $userModel->getAll();

        return view('admin/data_user.php', ['user' => $userData]);
    }
}
