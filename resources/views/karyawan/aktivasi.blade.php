@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <fieldset class="border p-3" style="width:100%">
            <div class="row">
                <div class="col-5">
                    <legend>Aktivasi Pelanggan</legend>
                    <form action="/pelanggan" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Pelanggan</label>
                            <div class="col">
                                <input type="text" maxlength="50" class="form-control" name="nama_pelanggan" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">NPWP</label>
                            <div class="col">
                                <input type="text" maxlength="15" class="form-control" name="npwp" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nomor Telepon</label>
                            <div class="col">
                                <input type="tel" maxlength="13" class="form-control" name="no_telepon" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Judul Kontrak</label>
                            <div class="col">
                                <input type="text" maxlength="150" class="form-control" name="judul_kontrak" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Awal Kontrak</label>
                                <input type="date" name="tanggal_mulai_kontrak" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Lama Kontrak</label>
                                <div class="input-group">
                                    <select name="jangka_waktu" required class="custom-select">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="6">6</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                        <option value="24">24</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="btn btn-outline-secondary disabled">Bulan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Email</label>
                                <input type="text" maxlength="50" name="email_pelanggan" class="form-control" required>
                            </div>
                            <div class="col">
                                <label>Passowrd</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label>Layanan</label><br>
                                    <select class="form-control" name="kode_layanan" id="layanan" onchange="set_harga_and_konfigurasi();">
                                        <option value="" selected disabled hidden>Pilih layanan</option>
                                    @foreach ($dataLayanan as $l)
                                        <option value="{{$l->kode_layanan}}|{{$l->harga}}|{{$l->konfigurasi_layanan}}">{{$l->nama_layanan}}</option>
                                    @endforeach
                                    </select>
                                    <label>Alamat</label><br>
                                    <textarea class="form-control" maxlength="255" class="form-control" id="alamat"></textarea>
                                </div>
                            </div>
                            <div id="detil_service">
                                <input type="number" min="1" minlength="1" id="count" value="1" hidden>
                            </div>
                            <div class="col align-text-bottom">
                                <label> Harga : <span id="harga"></span></label><br>
                                <label> Konfigurasi : <span id="konfigurasi"></span></label><br>
                                <a class="btn btn-info" onclick="add_detil_service()">Tambahkan</a>
                            </div>
                        </div>
                </div>
                <div class="col">
                    <fieldset class="border p-3">
                        <legend>Daftar Lokasi Layanan</legend>
                        <div class="row">
                            <div class="col table-responsive" style="position: relative;height: 200px;overflow-y: auto;width:100%;">
                                <table class="table table-hover" id="all_data_layanan">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nama Layanan</th>
                                            <th scope="col" width="30%">Lokasi</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Konfigurasi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detil_layanan">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7">
                                <label class="col col-form-label">Total Pemasangan Layanan : </label>
                                <label class="col col-form-label">Total Biaya Per Bulan: <br>
                                <h1 class="display-5"><span id="total">0</span></h1>
                                </label>
                            </div>
                            <div class="col row align-text-right">
                                <div class="col-8">
                                    Standar Garansi (dalam %)
                                </div>
                                <div class="col">
                                    <input type="number" name="slg" id="" min="0" max="99.9" step="0.1" value="99">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">File Kontrak</label>
                        <div class="col-lg-3">
                            <input type="file" class="form-control" name="file" >
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success float-right" value="Berlangganan" onclick="cek_data_layanan()">
                </div>
            </div>
            
        </form>
        </fieldset>
    </div>
    <br><br>
    <div class="row">
        <div class="col">
            <table id="data-table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">NPWP</th>
                        <th scope="col">Total Kontrak</th>
                        <th scope="col">Total Pemasangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Adithya Visnu 1 </th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <th scope="row">Adithya Visnu 2 </th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <th scope="row">Adithya Visnu 3</th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <th scope="row">Adithya Visnu 4</th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <th scope="row">Adithya Visnu5 </th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                    <tr>
                        <th scope="row">Adithya Visnu 6</th>
                        <td>adithyavisnu@gmail.com</td>
                        <td>08112130801</td>
                        <td>137134098130493</td>
                        <td>6</td>
                        <td>102</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<script src="{{ asset('js/forms.js')}}"></script>
@endsection