@extends('users.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-8">
            <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="periode">
                        <option value="">Periode</option>
                        <option value="201902">Februari 2019</option>
                        <option value="201901">Januari 2019</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <select class="form-control" name="periode">
                        <option value="">Judul Kontrak</option>
                        <option value="201902">KTel/2018/9/2001</option>
                        <option value="201901">Januari 2019</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info mb-2">Pilih</button>
            </form>    
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table id="data-table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Service ID</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Konfigurasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">SLG</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">Total Time to Resolve</th>
                        <th scope="col">Ketersediaan Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">442003992-1299101</th>
                        <td>VPN IP</td>
                        <td>5 MBPS - 10 MBPS Upload</td>
                        <td>Jln. Cihanjuang Gg Bp Sai, Gedung Visnu</td>
                        <td>99%</td>
                        <td>2</td>
                        <td>3 jam 12 menit</td>
                        <td>98.5%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">Menampilkan Periode: Januari 2019</div>
        <div class="col"><a href="">Lihat Bukti Transfer</a></div>
        <div class="col-2 text-right"><button class="btn btn-success">Download</button></div>
        <div class="col-2 text-right">< 1 2 3 4 5 ></div>
    </div>
@endsection