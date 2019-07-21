<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $b = new BASelesai;
        $b->kode_tiket = $request->input('kode_tiket');
        $b->tanggal_ba_selesai = $date;
        $b->selesai_oleh = $solvedBy;
        
        if($request->hasFile('bukti_trf')){
            $filenameWithExt = $request->file('bukti_trf')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('bukti_trf')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.$request->input('kode_tiket').'-'.time().$extension;
            $path = $request->file('bukti_trf')->storeAs('public/bukti_trf', $fileNameToStore);
        } else {
            $fileNameToStore = '';
        }

        $b->bukti_ba_selesai = $fileNameToStore;
        $b->save();
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
