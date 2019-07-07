@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Filter Data Resitusi</legend>
                <form action="">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Pelanggan</label>
                        <div class="col-8">
                            <input type="text" maxlength="40" class="form-control" name="id_ticket" >
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-4 col-form-label">Kontrak</label>
                        <div class="col-8">
                            <select class="form-control" name="id_kontrak">
                                <option value="1">KTel/2018/08/19</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-4 col-form-label">Periode</label>
                        <div class="col-8">
                            <select class="form-control" name="id_jenis_keluhan">
                                <option value="201901">Januari 2019</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Filter">
                </form>
            </fieldset>
            <br>
            <div class="row">
                <div class="col">
                    Total Restitusi 
                    <h1 class="display-5">Rp {{number_format(11111111 * 11) }}</h1>
                </div>
                <div class="col-5">
                    Rata-rata SLG
                    <h1 class="display-5">Rp {{number_format(98.7) }}%</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Bukti Transfer Restitusi</legend>
                    <form action="">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Pelanggan</label>
                            <div class="col-8">
                                <input type="text" maxlength="40" class="form-control" name="id_ticket" >
                            </div>
                        </div>
                        <div class="form-group row">                    
                            <label class="col-4 col-form-label">Kontrak</label>
                            <div class="col-8">
                                <select class="form-control" name="id_kontrak">
                                    <option value="1">KTel/2018/08/19</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">                    
                            <label class="col-4 col-form-label">Periode</label>
                            <div class="col-8">
                                <select class="form-control" name="id_jenis_keluhan">
                                    <option value="201901">Januari 2019</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Periode</label>
                            <div class="col">
                                <input type="file" name="bukti_close" alt="Upload Bukti Close Tiket">
                            </div>
                        </div>        
                        <div class="form-group row">
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
                        <th scope="col">Service ID</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Konfigurasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">SLG</th>
                        <th scope="col">Aktual Ketersediaan Layanan</th>
                        <th scope="col">Selisih</th>
                        <th scope="col">Jumlah Kompensasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">442003992-1299101</th>
                        <td>VPN IP</td>
                        <td>5 MB download- 10 MN upload</td>
                        <td>Jln Cihanjuang Gang Bp sai no 19 b</td>
                        <td>99%</td>
                        <td>98.7%</td>
                        <td>0.3%</td>
                        <td><a>Rp {{number_format(13100)}}</a></td>
                    </tr>
                    <tr>
                        <th scope="row">442003992-1299133</th>
                        <td>Astinet</td>
                        <td>5 MB download- 10 MN upload</td>
                        <td>Jln Cihanjuang Gang Bp sai no 19 b</td>
                        <td>99%</td>
                        <td>98%</td>
                        <td>1%</td>
                        <td><a>Rp {{number_format(26600)}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection