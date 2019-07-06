<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function Layanan()
    {
        # code...
        $data = [
            "title" => "Data Kontrak dan Layanan",
            "menu" => "layanan"
        ];
        return view('users.layanan')->with($data);
    }
    public function TiketGangguan()
    {
        # code...
        $data = [
            "title" => "Data Tiket Gangguan",
            "menu" => "tiket"
        ];
        return view('users.tiket')->with($data);
    }
    public function LaporanLayanan()
    {
        # code...
        $data = [
            "title" => "Laporan Ketersediaan Layanan Bulanan",
            "menu" => "lapLayanan"
        ];
        return view('users.lapLayanan')->with($data);
    }
    public function LaporanRestitusi()
    {
        # code...
        $data = [
            "title" => "Laporan Perhitungan dan Bukti Transfer Restitusi",
            "menu" => "lapRestitusi"
        ];
        return view('users.lapRestitusi')->with($data);
    }
}
