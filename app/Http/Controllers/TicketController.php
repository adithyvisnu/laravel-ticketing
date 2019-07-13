<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;

class TicketController extends Controller
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
        $tgl_mulai = date_create()->format('Y-m-d H:i:s');
        $t = new Tiket;
        $t->kode_tiket = $request->input('kode_tiket');
        $t->keterangan_keluhan = $request->input('keterangan_keluhan');
        $t->kode_pelanggan = 1;
        $t->kode_jenis_keluhan = $request->input('kode_jenis_keluhan');
        $t->kode_service_id = $request->input('kode_service_id');
        $t->tanggal_waktu_buat = $tgl_mulai;
        $t->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tiket::with('detil_kontrak','jenis_keluhan','jenis_solusi')->first();
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
