<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Layanan()
    {
        # code...
        $data = [
            "title" => 'Data Layanan',
            "menu" => 'layanan'
        ];
        return view('admin.layanan')->with($data);
    }

    public function Jabatan()
    {
        # code...
        $data = [
            "title" => 'Data Jabatan',
            "menu" => 'jabatan'
        ];
        return view('admin.jabatan')->with($data);
    }
    
    public function Karyawan()
    {
        # code...
        $data = [
            "title" => 'Data Karyawan',
            "menu" => 'karyawan'
        ];
        return view('admin.karyawan')->with($data);
    }
}
