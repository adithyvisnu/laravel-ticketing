<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;
use App\Restitusi;
use App\DetilKontrak;

class RestitusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get total sec in one month
        // thanks to https://stackoverflow.com/questions/7651263/subtract-1-day-with-php
        $create = date_create(date('Y')."-".date('m')."-"."01");
        date_add($create,date_interval_create_from_date_string("1 month"));
        $total_day = date('d',(strtotime ( '-1 day' , strtotime ( $create->format('Y-m-d') ) ) ));
        $total_sec = $total_day * 60 * 60 * 24;
        $kode_tiket = $request->input('kode_tiket');
        $tiket = Tiket::where('kode_tiket', $kode_tiket)->first();
        $listTiketSolved = Tiket::where('kode_service_id', $tiket->kode_service_id)->get();
        $total_time = 0;
        foreach($listTiketSolved as $t){
            // thanks to https://stackoverflow.com/questions/3176609/calculate-total-seconds-in-php-dateinterval
            $date_awal = date_create($t->tanggal_waktu_buat);
            $date_akhir = date_create($t->tanggal_waktu_selesai);
            $total_time += $date_akhir->getTimestamp() - $date_awal->getTimestamp();
        }
        $percentage = (($total_sec - $total_time) / $total_sec) * 100;
        $data_kontrak = DetilKontrak::with('kontrak', 'layanan')->where('kode_service_id', $tiket->kode_service_id)->first();
        if($percentage < $data_kontrak->kontrak->level_garansi_layanan){
            $listTiketSolved = Tiket::where('kode_service_id', $tiket->kode_service_id)->get();
            foreach($listTiketSolved as $t){
                // thanks to https://stackoverflow.com/questions/3176609/calculate-total-seconds-in-php-dateinterval
                $date_awal = date_create($t->tanggal_waktu_buat);
                $date_akhir = date_create($t->tanggal_waktu_selesai);
                $durasi = $date_akhir->getTimestamp() - $date_awal->getTimestamp();
                $percentage = (($total_sec - $durasi) / $total_sec) * 100;
                $selisih = $data_kontrak->kontrak->level_garansi_layanan - $percentage;
                $selisih = 100 - $selisih;
                $selisih = number_format((float)abs($selisih), 2, '.', '');
                $selisih = 100 - $selisih;
                $restitusi = ($selisih/100) * $data_kontrak->layanan->harga;

                $exists = Restitusi::where('kode_tiket', $t->kode_tiket)->exists();
                if(!$exists){
                    $r = new Restitusi;
                    $r->tanggal_waktu_terbit = date_create()->format('Y-m-d H:i:s');
                    $r->jumlah = $restitusi;
                    $r->kode_tiket= $t->kode_tiket;
                    $r->save();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
