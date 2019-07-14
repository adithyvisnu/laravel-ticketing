<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Layanan;
use App\JenisKeluhan;
use App\JenisSolusi;
use App\Tiket;
use App\DetilKontrak;
use PDF;

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
            "dataTiket" => Tiket::with('jenis_keluhan')->get()
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
            "menu" => "bayarRestitusi",
            "dataDetilKontrak" => DetilKontrak::with('kontrak','layanan','tiket')->get()
        ];
        return view('karyawan.restitusi')->with($data);
    }

    public function PemetaanSolusi() {
        $data = [
            "title" => "Form Pemetaan Jenis Solusi dan Jenis Keluhan",
            "menu" => "solusiKeluhan",
            "dataJenisKeluhan" => JenisKeluhan::all(),
            "dataJenisSolusi" => JenisSolusi::with("jenis_keluhan")->get()
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

    public function DownloadTiket(){
        $data = [
            "title" => "Laporan Ketersediaan Layanan Bulanan",
            "menu" => "lapLayanan",
            "dataTiket" => Tiket::with('jenis_keluhan')->get()
        ];
        // return view('download.layanan')->with($data);
        $pdf = PDF::loadView('download.tiket', $data);
        return $pdf->download('tiket-'.date('Ym').'.pdf');
    }

    public function DownloadRestitusi(){
        $data = [
            "title" => "Laporan Perhitungan dan Bukti Transfer Restitusi",
            "menu" => "lapRestitusi",
            "dataDetilKontrak" => DetilKontrak::with('kontrak','layanan','tiket')->get()
        ];
        $pdf = PDF::loadView('download.restitusi', $data);
        return $pdf->download('Restitusi-'.date('Ym').'.pdf');
    }
}
