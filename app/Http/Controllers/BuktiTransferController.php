<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BuktiTransfer;

class BuktiTransferController extends Controller
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
        $date = date_create()->format('Y-m-d H:i:s');
        $b = new BuktiTransfer;
        $b->kode_pelanggan = $request->input('kode_pelanggan');
        $b->tanggal_transfer = $date;
        $b->periode_layanan = $request->input('periode');
        
        if($request->hasFile('bukti_trf')){
            $filenameWithExt = $request->file('bukti_trf')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('bukti_trf')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.$request->input('kode_tiket').'-'.time().$extension;
            $path = $request->file('bukti_trf')->storeAs('public/bukti_trf', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        $b->bukti_transfer = $fileNameToStore;
        $b->save();
        return redirect('/karyawan/pembayaran/restitusi');
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
