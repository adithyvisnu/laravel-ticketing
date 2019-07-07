<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class KaryawanController extends Controller
{
    public function TiketGangguan()
    {
         $data = [
            "title" => "Data Tiket Gangguan",
            "menu" => "tiket"
        ];
        return view('karyawan.tiket')->with($data);
    }

    public function AktivasiPelanggan() {
         $data = [
            "title" => "Aktivasi dan Data Pelanggan",
            "menu" => "aktivasi"
        ];
        return view('karyawan.aktivasi')->with($data);
    }

    public function PembayaranRestitusi() {
        $data = [
            "title" => "Form Bukti Transfer Restitusi",
            "menu" => "bayarRestitusi"
        ];
        return view('karyawan.restitusi')->with($data);
    }

    public function PemetaanSolusi() {
        $data = [
            "title" => "Form Pemetaan Jenis Solusi dan Jenis Keluhan",
            "menu" => "solusiKeluhan"
        ];
        return view('karyawan.pemetaanSolusi')->with($data);
    }

    public function LaporanTiket() {
        $data = [
            "title" => "Cetak Laporan Tiket",
            "menu" => "lapTiket"
        ];
        return view('karyawan.lapTiket')->with($data);
    }

    public function LaporanRestitusi() {
        $data = [
           "title" => "Cetak Laporan Restitusi",
           "menu" => "lapRestitusi"
       ];
       return view('karyawan.lapResitusi')->with($data);
    }
}
