@extends('users.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-4">
            <fieldset class="border p-1">
                <legend>Total Layanan</legend>
                <h5>101</h5>
                <div class="border p-2">
                    VPN IP - 10<br>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-4">
            <fieldset class="border p-1">
                <legend>Total Kontrak</legend>
                <h5>5</h5>
                <div class="border p-2">
                    @if(count($dataKontrak) > 0)
                        @foreach ($dataKontrak as $k)
                    <a id="id_kontrak">{{$k->judul_kontrak}}</a><br>
                        @endforeach
                    @endif
                </div>
            </fieldset>
        </div>
        <div class="col-lg-4 p-2">
                <h1 class="display-5">KTel/2018/08/16/DES</h5>
                Start Date : 19 Januari 2019
                <br>
                End Date : 18 Januari 2020
                <h2 class="display-5">Rp. {{number_format(125000000,2)}}</h5>
                
            </fieldset>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-10">
            <table id="data-table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Layanan</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Konfigurasi</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($dataKontrak) > 0)
                        @foreach ($dataKontrak as $k)
                            @foreach ($k->detil_kontrak as $layanan)
                                <tr>
                                    <th scope="row">{{$layanan->kode_service_id}}</th>
                                    <td>{{$layanan->kode_layanan}}</td>
                                    <td>{{$layanan->kode_kontrak}}</td>
                                    <td>{{$layanan->alamat}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        <tr><th>Belum ada langganan layanan</th></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection