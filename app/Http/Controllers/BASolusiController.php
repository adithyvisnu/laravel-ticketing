<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BASolusi;
use App\DetilSolusi;
use App\Tiket;

class BASolusiController extends Controller
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
        $sess = \Session::get('users');
        $b = new BASolusi;
        $b->kode_tiket = $request->input('kode_tiket');
        $b->tanggal_ba_solusi = date_create()->format('Y-m-d H:i:s');
        $b->solusi_oleh = $sess->nama_karyawan;
        $b->save();
        $kode_ba_solusi = $b->kode_ba_solusi;

        $ds = new DetilSolusi;
        $ds->kode_ba_solusi = $kode_ba_solusi;
        $kode_jenis_solusi = $request->input('kode_jenis_solusi');
        $keterangan_solusi = $request->input('keterangan_solusi');
        $arr = array();
        $a = 0;
        foreach ($kode_jenis_solusi as $detil_solusi) {
            $arrtmp = array();
            $arrtmp['kode_ba_solusi'] = $kode_ba_solusi;
            $arrtmp['kode_jenis_solusi'] = $detil_solusi;
            $arrtmp['keterangan'] = $keterangan_solusi[$a];
            array_push($arr, $arrtmp);
            $a++;
        }
        DetilSolusi::insert($arr);

        $t = Tiket::where('kode_tiket', '=' ,$request->input('kode_tiket'))->firstOrFail();
        $t->nik = $sess->nik;
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
        return BASolusi::with('detil_solusi')->where('kode_ba_solusi', $id)->first();
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
