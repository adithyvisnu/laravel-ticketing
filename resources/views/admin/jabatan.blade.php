@extends('admin.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-3">
            <fieldset class="border p-1">
                <legend>Data Jabatan</legend>
                <h5>101</h5>
                <div class="border p-2">
                        Karyawan - 10<br>
                        Karyawan - 10<br>
                        Karyawan - 10<br>
                </div>
            </fieldset>
        </div>
        <div class="col-lg-3">
            <fieldset class="border p-2">
                <legend>Form Jabatan</legend>
                <form action="">
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" maxlength="50" name="jabatan" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Add">
                </form>
            </fieldset>
        </div>
        <div class="col">
            <table id="data-table" class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID Jabatan</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Ubah</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Ubah</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>Ubah</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection