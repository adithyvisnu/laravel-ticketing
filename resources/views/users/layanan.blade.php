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
                    <a id="id_kontrak">KTel/2018/08/16/DES</a><br>
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
    <div class="row" style="margin-top:40px">
        <form class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input type="password" class="form-control" name="keywords" placeholder="Nama Layanan / ID Layanan">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Layanan</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Konfigurasi</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Ubah</td>
                        <td>Ubah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection