<?php

namespace App\Controllers;

class Kalori extends BaseController
{

    public function index(): string
    {
        return view('layout/header') .
        view('content/index.php') .
        view('layout/footer');

        $usia = $this->request->getPost('usia');
        echo $usia;
    }
}
 