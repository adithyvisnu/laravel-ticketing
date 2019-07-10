@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <fieldset class="border p-3" style="width:95%">
            <div class="row">
                <div class="col-5">
                    <legend>Aktivasi Pelanggan</legend>
                    <form action="/pelanggan" method="POST">
                        {{crsf_field()}}
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nama Pelanggan</label>
                            <div class="col">
                                <input type="text" maxlength="50" class="form-control" name="nama_pelanggan" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">NPWP</label>
                            <div class="col">
                                <input type="text" maxlength="15" class="form-control" name="npwp" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Nomor Telepon</label>
                            <div class="col">
                                <input type="tel" maxlength="13" class="form-control" name="no_telepon" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Judul Kontrak</label>
                            <div class="col">
                                <input type="text" maxlength="150" class="form-control" name="judul_kontrak" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Awal Kontrak</label>
                                <input type="date" name="tanggal_mulai_kontrak" class="form-control">
                            </div>
                            <div class="col">
                                <label>Lama Kontrak</label>
                                <div class="input-group">
                                    <select class="custom-select">
                                        <option selected>Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">6</option>
                                        <option value="3">12</option>
                                        <option value="3">18</option>
                                        <option value="3">24</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="btn btn-outline-secondary disabled">Bulan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div>
                                    <label>Layanan</label><br>
                                    <select class="form-control" name="id_jenis_solusi">
                                    @foreach ($dataLayanan as $l)
                                        <option value="{{$l->kode_layanan}}">{{$l->nama_layanan}}</option>
                                    @endforeach
                                        <option value="1">VPN IP</option>
                                        <option value="2">Router</option>
                                        <option value="3">Astinet</option>
                                    </select>
                                    <label>Alamat</label><br>
                                    <textarea class="form-control" maxlength="255" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col align-text-bottom">
                                <br><br>
                                <input type="submit" class="btn btn-info" value="Tambahkan">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <fieldset class="border p-3">
                        <legend>Daftar Lokasi Layanan</legend>
                        <div class="row">
                            <div class="col table-responsive" style="position: relative;height: 200px;overflow-y: auto;width:100%;">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Nama Layanan</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Konfigurasi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">VPN IP</th>
                                            <td>JLN. Cihanjuang Gang Wisnu</td>
                                            <td>Rp {{number_format(11111111)}}</td>
                                            <td>5 MB Upload - 10 Mb Download</td>
                                            <td><a href="">Hapus</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-7">
                                <label class="col col-form-label">Total Pemasangan Layanan : 56</label>
                                <label class="col col-form-label">Total Biaya Per Bulan: <br>
                                <h1 class="display-5">Rp {{number_format(11111111 * 11) }}</h1>
                                </label>
                            </div>
                            <div class="col row align-text-right">
                                <div class="col-8">
                                    Standar Garansi (dalam %)
                                </div>
                                <div class="col">
                                    <input type="number" name="slg" id="" min="0" max="99">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">File Kontrak</label>
                        <div class="col-lg-3">
                            <input type="file" class="form-control" name="file_kontrak" >
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success float-right" value="Berlangganan">
                </div>
            </div>
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