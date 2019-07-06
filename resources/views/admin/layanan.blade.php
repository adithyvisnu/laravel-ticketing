@extends('admin.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-6">
            <fieldset class="border p-1">
                <legend>Form Layanan</legend>
                <form action="">
                    <table>
                        <tr>
                            <td width="70%">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Nama Layanan</label>
                                    <div class="col-sm-8">
                                        <input type="text" maxlength="40" class="form-control" name="nama_layanan" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Konfigurasi Layanan</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" maxlength="255" name="konfigurasi_layanan"></textarea>
                                    </div>
                                </div>
                            </td>
                            <td class="p-1">
                                <div class="form-group">
                                    <label>Harga (dalam rupiah)</label>
                                    <input type="text" pattern="^[0-9]{,8}$" class="form-control" maxlength="8" name="harga_layanan">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <input type="submit" class="btn btn-success float-right" value="Add">
                </form>
            </fieldset>
        </div>
        <div class="col-lg-3">
            <fieldset class="border p-1">
                <legend>Data Layanan</legend>
                <h5>101</h5>
                <div class="border p-2">
                        Karyawan - 10<br>
                </div>
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