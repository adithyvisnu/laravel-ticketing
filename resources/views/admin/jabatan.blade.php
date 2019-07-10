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
                <form action="/jabatan" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nama Jabatan</label>
                        <input type="text" maxlength="50" name="nama_jabatan" class="form-control">
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
                    @if(count($dataJabatan) > 0)
                        @foreach ($dataJabatan as $j)
                        <tr>
                            <th scope="row">{{$j->kode_jabatan}}</th>
                            <td>{{$j->nama_jabatan}}</td>
                            <td><a href="">Ubah</a></td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" scope="row">Data Jabatan Tidak ada di Sistem</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection