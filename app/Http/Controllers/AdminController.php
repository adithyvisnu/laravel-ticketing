<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\Layanan;
use App\Karyawan;

class AdminController extends Controller
{
    public function Layanan()
    {
        $sess = \Session::get('users');
        if(!$sess || $sess!='admin') {
            return redirect('/logout');
        }
        # code...
        $data = [
            "title" => 'Data Layanan',
            "menu" => 'layanan',
            "dataLayanan" => Layanan::all()
        ];
        return view('admin.layanan')->with($data);
    }

    public function Jabatan()
    {
        if(!$sess || $sess!='admin') {
            return redirect('/logout');
        }
        # code...
        $data = [
            "title" => 'Data Jabatan',
            "menu" => 'jabatan',
            "dataJabatan" => Jabatan::all()
        ];
        return view('admin.jabatan')->with($data);
    }
    
    public function Karyawan()
    {
        if(!$sess || $sess!='admin') {
            return redirect('/logout');
        }
        # code...
        $data = [
            "title" => 'Data Karyawan',
            "menu" => 'karyawan',
            "dataKaryawan" => Karyawan::with('jabatan')->get(),
            "dataJabatan" => Jabatan::all()
        ];
        return view('admin.karyawan')->with($data);
    }
}
