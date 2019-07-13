<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Layanan;
use App\JenisKeluhan;
use App\JenisSolusi;
use App\Tiket;

class KaryawanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $k = new Karyawan;
        $k->nik = $request->input('nik');
        $k->nama_karyawan = $request->input('nama_karyawan');
        $k->email_karyawan = $request->input('email_karyawan');
        $k->password = \Hash::make($request->input('password'));
        $k->no_telepon = $request->input('nomor_telepon');
        $k->kode_jabatan = $request->input('kode_jabatan');
        $k->save();
        return redirect('/admin/karyawan');
    }

    public function TiketGangguan()
    {
         $data = [
            "title" => "Data Tiket Gangguan",
            "menu" => "tiket",
            "dataTiket" => Tiket::all()
        ];
        return view('karyawan.tiket')->with($data);
    }

    public function AktivasiPelanggan() {
         $data = [
            "title" => "Aktivasi dan Data Pelanggan",
            "menu" => "aktivasi",
            "dataLayanan" => Layanan::all()
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
            "menu" => "solusiKeluhan",
            "dataJenisKeluhan" => JenisKeluhan::all(),
            "dataJenisSolusi" => JenisSolusi::all()
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
