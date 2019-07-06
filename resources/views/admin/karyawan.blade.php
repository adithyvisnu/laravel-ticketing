@extends('admin.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-8">
            <fieldset class="border p-2">
                <legend>Form Karyawan</legend>
                <form action="">
                    <div class="form-group row" style="width:100%">
                        <label class="col-lg-2 col-form-label">NIK</label>
                        <div class="col">
                            <input type="text" maxlength="40" class="form-control" name="nama_karyawan" >
                        </div>
                        <label class="col-lg-2 col-form-label">Email Karyawan</label>
                        <div class="col">
                            <input type="text" maxlength="40" class="form-control" name="email_karyawan" >
                        </div>
                    </div>
                    <div class="form-group row" style="width:100%">
                        <label class="col-lg-2 col-form-label">Nama Karyawan</label>
                        <div class="col">
                            <input type="text" maxlength="40" class="form-control" name="nama_karyawan" >
                        </div>
                        <label class="col-lg-2 col-form-label">Password</label>
                        <div class="col">
                            <input type="text" maxlength="40" class="form-control" name="password" >
                        </div>
                    </div>
                    <div class="form-group row" style="width:100%">
                        <label class="col-lg-2 col-form-label">Nomor Telepon</label>
                        <div class="col-lg-4">
                            <input type="tel" maxlength="40" class="form-control" name="nomor_telepon" >
                        </div>
                    </div>
                    <div class="form-group row" style="width:100%">
                        <label class="col-lg-2 col-form-label">Jabatan</label>
                        <div class="col-lg-4">
                            <select class="form-control" name="kode_jabatan">
                                <option value="1">Manager</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="submit" class="btn btn-success float-right" value="Add">
                        </div>
                    </div>
                    
                </form>
            </fieldset>
        </div>
        <div class="col-lg-3">
            <fieldset class="border p-1">
                <legend>Data Karyawan</legend>
                <h5>101</h5>
                <div class="border p-2">
                        Karyawan - 10<br>
                </div>
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
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Ubah</td>
                        <td>Ubah</td>
                        <td>Ubah</td>
                        <td>Ubah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection