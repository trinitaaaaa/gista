<?php

namespace App\Controllers;
use \App\Models\GunungModel;
class Penginput extends BaseController
{
    public function index() {
        return view('penginput/index.php');
        
    }
}