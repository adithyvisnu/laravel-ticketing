@extends('users.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-1">
                <legend>Submit Tiket Gangguan</legend>
                <form action="/ticket" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ticket ID</label>
                        <div class="col-lg-6">
                        <input type="text" readonly value="{{count($dataTiket)+1}}" maxlength="40" class="form-control" name="id_ticket" >
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-lg-3 col-form-label">Service ID</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="kode_service_id" >
                                <option selected disabled hidden>Pilih Service ID</option>
                            @foreach ($dataDetilKontrak as $dk)
                                <option value="{{$dk->kode_service_id}}">
                                    {{$dk->kode_service_id}}
                                    <br> - <small>{{$dk->alamat}}</small>
                                </option>                                    
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-lg-3 col-form-label">Jenis Keluhan</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="kode_jenis_keluhan">
                                <option selected disabled hidden>Pilih ID Jenis Keluhan</option>
                                @foreach ($dataJenisKeluhan as $jk)
                                    <option value="{{$jk->kode_jenis_keluhan}}">{{$jk->jenis_keluhan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-lg-3 col-form-label">Keluhan</label>
                        <div class="col-lg-6">
                            <textarea name="keterangan_keluhan" maxlength="255" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Buat Tiket Gangguan">
                </form>
            </fieldset>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Close Tiket Gangguan</legend>
                    <form action="/ba-selesai" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <img src="" alt="Image Upload Preview" style="min-width:150px; min-height:150px; border:1px solid #eee" id="preview">
                                <input type="file" name="bukti_close" accept="image/x-png,image/gif,image/jpeg" alt="Upload Bukti Close Tiket" onchange="showThumbnail(this);">
                            </div>
                            <div class="col" style="vertical-align:bottom">
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
                                    {{$t->ba_selesai->tanggal_ba_selesai}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if(!is_null($t->ba_solusi))
                                    {{$t->ba_solusi->solusi_oleh}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if(is_null($t->ba_selesai))
                                    <a href="#" onclick="get_tiket_ba_selesai({{$t->kode_tiket}})">Close Tiket</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="8">Data Tiket tidak tersedia di sistem</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
<script src="{{ asset('js/forms.js')}}"></script>
@endsection