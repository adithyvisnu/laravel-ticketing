<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BASelesai;
use App\Tiket;

class BASelesaiController extends Controller
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
        $b->selesai_oleh = "Gani Amri";
        $b->bukti_ba_selesai = "";
        $b->save();

        $t->$t = Tiket::where('kode_tiket', '=' ,$request->input('kode_tiket'))->firstOrFail();
        $t->tanggal_waktu_selesai = $date;
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
