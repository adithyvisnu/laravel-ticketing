@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Buat BA Solusi</legend>
                <form action="/ba-solusi" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col">
                            <div class="row">
                                <label class="col-lg-4 col-form-label">Ticket ID</label>
                                <label class="col-lg-8 col-form-label" id="kode_tiket_solusi"><i> Silakan pilih tiket</i></label>
                                <input type="text" hidden readonly maxlength="40" class="form-control" name="kode_tiket" >
                            </div>
                            <div class="row">
                                <label class="col-lg-4 col-form-label">Jenis Keluhan</label>
                                <label class="col-lg-8 col-form-label" id="jenis_keluhan_solusi"><i> Silakan pilih tiket</i></label>
                            </div>
                            <div class="row">
                                <label class="col-lg-4 col-form-label">Keluhan</label>
                                <label class="col-lg-8 col-form-label" id="keterangan_keluhan_solusi"><i> Silakan pilih tiket</i></label>
                            </div>
                            <div class="row">                 
                                <label class="col-lg-4 col-form-label">Jenis Solusi</label>
                                <div class="col-lg-8">
                                    <select class="form-control" name="kode_jenis_solusi" id="list_jenis_solusi">
                                        <option value="" disabled hidden>Pilih Jenis Solusi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="col-form-label">Keluhan</label><br>
                                    <textarea class="form-control" maxlength="255" class="form-control" id="keterangan_solusi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="list_solusi">
                            <input type="number" hidden readonly id="count" value="0">
                        </div>
                        <div class="col">
                            <div class="row">
                                <label class="col-lg-4 col-form-label">Service ID</label>
                                <label class="col-lg-8 col-form-label" id="service_id_solusi"><i> Silakan pilih tiket</i></label>
                            </div>
                            <div class="row">
                                <div class="col table-responsive" style="position: relative;height: 200px;overflow-y: auto;width:100%;">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Jenis Solusi</th>
                                                <th scope="col">Solusi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detil_solusi">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-3">
                                    <a class="btn btn-info" onclick="add_detil_solusi()"> Add</a>
                                </div>
                                <div class="col text-right">
                                    <input type="submit" class="btn btn-success" onclick="cek_solusi()" value="Submit BA Solusi">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Close Tiket Gangguan</legend>
                    <form action="/ba-selesai" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tiket ID</label>
                            <label class="col-lg-3 col-form-label" id="kode_tiket_close"><i> Silakan pilih tiket</i></label>
                            <input type="text" name="kode_tiket" hidden readonly>
                            <label class="col-lg-2 col-form-label">Service ID</label>
                            <label class="col col-form-label" id="service_id_close"><i> Silakan pilih tiket</i></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jenis Keluhan</label>
                            <label class="col col-form-label" id="jenis_keluhan_close"><i> Silakan pilih tiket</i></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Keluhan</label>
                            <label class="col col-form-label" id="keterangan_keluhan_close"><i> Silakan pilih tiket</i></label>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Upload Bukti Gangguan Selesai</label>
                                <img src="" alt="Image Upload Preview" style="min-width:150px; min-height:150px; border:1px solid #eee" id="preview">
                                <input type="file" name="bukti_close" alt="Upload Bukti Close Tiket" onchange="showThumbnail(this);">
                            </div>
                            <div class="col" style="align-text-bottom">
                                <input type="submit" class="btn btn-success float-right" value="Close Tiket Gangguan">
                            </div>
                        </div>        
                        
                    </form>
            </fieldset>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <table id="data-table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tiket ID</th>
                        <th scope="col">Service ID</th>
                        <th scope="col">Jenis Keluhan</th>
                        <th scope="col">Open Time</th>
                        <th scope="col">Solution Time</th>
                        <th scope="col">Close Time</th>
                        <th scope="col">PIC</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($dataTiket) > 0)
                        @foreach ($dataTiket as $t)
                        <tr id="tiket-{{$t->kode_tiket}}">
                            <th scope="row">{{$t->kode_tiket}}</th>
                            <td>{{$t->kode_service_id}}</td>
                            <td>{{$t->jenis_keluhan->jenis_keluhan}}</td>
                            <td>{{$t->tanggal_waktu_buat}}</td>
                            <td>
                                @if(!is_null($t->ba_solusi))
                                    {{$t->ba_solusi->tanggal_ba_solusi}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if(!is_null($t->ba_selesai))
                                    {{$t->ba_solusi->tanggal_ba_selesai}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                Adithya Visnu
                            </td>
                            <td>
                                @if(is_null($t->ba_solusi))
                                    <a href="#" onclick="get_tiket_ba_solusi({{$t->kode_tiket}})">Buat BA Solusi</a>
                                @elseif(is_null($t->ba_selesai))
                                    <a href="#" onclick="close_tiket({{$t->kode_tiket}})">Close Tiket</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="8">Data Tiket tidak tersedia di sistem</td></tr>
                    @endif
                    <tr>
                        <th scope="row">IN1001929</th>
                        <td>442003992-1299101</td>
                        <td>Jaringan Tidak Stabil</td>
                        <td>20 April 2019 6.04 PM</td>
                        <td>20 April 2019 6.12 PM</td>
                        <td>20 April 2019 6.14 PM</td>
                        <td>Munadi</td>
                        <td><a>Buat BA Solusi</a></td>
                    </tr>
                    <tr>
                        <th scope="row">IN1001921</th>
                        <td>442003992-213</td>
                        <td>Jaringan Mati</td>
                        <td>20 April 2019 6.04 PM</td>
                        <td>20 April 2019 6.14 PM</td>
                        <td>20 April 2019 6.19 PM</td>
                        <td>Karyo</td>
                        <td><a>Close Tiket</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection