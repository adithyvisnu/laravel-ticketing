<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Kontrak;
use App\DetilKontrak;
use App\JenisKeluhan;
use App\Tiket;
use App\BuktiTransfer;
use PDF;

class PelangganController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_karyawan) {
            return redirect('/logout');
        }
        $tgl_mulai = date_create($request->input('tanggal_mulai'));
        $tgl_selesai = date_create($request->input('tanggal_mulai'));
        date_add($tgl_selesai, date_interval_create_from_date_string($request->input('jangka_waktu').' months'));
        $tgl_mulai = $tgl_mulai->format('Y-m-d');
        $tgl_selesai = $tgl_selesai->format('Y-m-d');

        $p = new Pelanggan;
        $p->nama_pelanggan = $request->input('nama_pelanggan');
        $p->email_pelanggan = $request->input('email_pelanggan');
        $p->password = \Hash::make($request->input('password'));
        $p->no_telepon = $request->input('no_telepon');
        $p->npwp = $request->input('npwp');
        $p->nik = $sess->nik;
        $p->save();
        $kode_pelanggan = $p->kode_pelanggan;

        $k = new Kontrak;
        $k->judul_kontrak = $request->input('judul_kontrak');
        $k->tanggal_mulai_kontrak = $tgl_mulai;
        $k->tanggal_selesai_kontrak = $tgl_selesai;
        $k->level_garansi_layanan = $request->input('slg');
        $k->kode_pelanggan = $kode_pelanggan;

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.$kode_pelanggan.'-'.time().$extension;
            $path = $request->file('file')->storeAs('public/kontrak', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        $k->save();
        $kode_kontrak = $k->kode_kontrak;

        $arr = array();
        $dl = new DetilKontrak;
        $services = $request->input('layanan');
        $addresses = $request->input('alamat');
        $a = 0;
        foreach($services as $kode_services) {
            $arrtmp = array();
            $arrtmp['kode_service_id'] = $kode_pelanggan."-".$kode_kontrak."-".$a;
            // $dl->kode_service_id = $kode_pelanggan."-".$kode_kontrak."-".$a;
            $arrtmp['kode_kontrak'] = $kode_kontrak;
            // $dl->kode_kontrak = $kode_kontrak;
            $tmp = explode("|",$kode_services);
            $arrtmp['kode_layanan'] = $tmp[0];
            // $dl->kode_layanan = $tmp[0];
            $arrtmp['alamat'] = $addresses[$a];
            // $dl->alamat = $addresses[$a];
            array_push($arr, $arrtmp);
            $a++;
        }
        DetilKontrak::insert($arr);
        return redirect('/karyawan/aktivasi');
    }

    public function Layanan()
    {
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        # code...
        $data = [
            "title" => "Data Kontrak dan Layanan",
            "menu" => "layanan",
            "dataKontrak" => Kontrak::with('detil_kontrak')->where('kode_pelanggan', $sess->kode_pelanggan)->get()
        ];
        return view('users.layanan')->with($data);
    }
    public function TiketGangguan()
    {
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        # code...
        $kode_pelanggan = $sess->kode_pelanggan;
        $data = [
            "title" => "Data Tiket Gangguan",
            "menu" => "tiket",
            "dataDetilKontrak" => DetilKontrak::with(['kontrak' => function ($q) use ($kode_pelanggan) {
                $q->where('kontrak.kode_pelanggan', $kode_pelanggan);
            }], 'layanan')->get(),
            "dataJenisKeluhan" => JenisKeluhan::all(),
            "dataTiket" => Tiket::with('jenis_keluhan','detil_kontrak')->where('kode_pelanggan', $sess->kode_pelanggan)->get()
        ];
        return view('users.tiket')->with($data);
    }
    public function LaporanLayanan()
    {
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        # code...
        $kode_pelanggan = $sess->kode_pelanggan;
        $data = [
            "title" => "Laporan Ketersediaan Layanan Bulanan",
            "menu" => "lapLayanan",
            "dataDetilKontrak" => DetilKontrak::with(['kontrak' => function ($q) use ($kode_pelanggan) {
                $q->where('kontrak.kode_pelanggan', $kode_pelanggan);
            }],'layanan','tiket')->get()
        ];
        return view('users.lapLayanan')->with($data);
    }
    public function LaporanRestitusi()
    {
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        # code...
        $kode_pelanggan = $sess->kode_pelanggan;
        $data = [
            "title" => "Laporan Perhitungan dan Bukti Transfer Restitusi",
            "menu" => "lapRestitusi",
            "dataDetilKontrak" => DetilKontrak::with(['kontrak' => function ($q) use ($kode_pelanggan) {
                $q->where('kontrak.kode_pelanggan', $kode_pelanggan);
            }],'layanan','tiket')->get(),
            "dataRestitusi" => BuktiTransfer::where('kode_pelanggan', $kode_pelanggan)->first()
        ];
        return view('users.lapRestitusi')->with($data);
    }

    public function DownloadLayanan(){
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        $kode_pelanggan = $sess->kode_pelanggan;
        $data = [
            "title" => "Laporan Ketersediaan Layanan Bulanan",
            "menu" => "lapLayanan",
            "dataDetilKontrak" => DetilKontrak::with(['kontrak' => function ($q) use ($kode_pelanggan) {
                $q->where('kontrak.kode_pelanggan', $kode_pelanggan);
            }],'layanan','tiket')->get()
        ];
        $pdf = PDF::loadView('download.layanan', $data);
        return $pdf->download('SLG-'.date('Ym').'.pdf');
    }

    public function DownloadRestitusi(){
        $sess = \Session::get('users');
        if(!$sess || !$sess->email_pelanggan) {
            return redirect('/logout');
        }
        $kode_pelanggan = $sess->kode_pelanggan;
        $data = [
            "title" => "Laporan Perhitungan dan Bukti Transfer Restitusi",
            "menu" => "lapRestitusi",
            "dataDetilKontrak" => DetilKontrak::with(['kontrak' => function ($q) use ($kode_pelanggan) {
                $q->where('kontrak.kode_pelanggan', $kode_pelanggan);
            }],'layanan','tiket')->get()
        ];
        $pdf = PDF::loadView('download.restitusi', $data);
        return $pdf->download('Restitusi-'.date('Ym').'.pdf');
    }
}
