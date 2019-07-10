@extends('admin.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-8">
            <fieldset class="border p-2">
                <legend>Form Karyawan</legend>
                <form action="/karyawan" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row" style="width:100%">
                        <label class="col-lg-2 col-form-label">NIK</label>
                        <div class="col">
                            <input type="text" maxlength="40" class="form-control" name="nik" >
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
                                @foreach ($dataJabatan as $j)
                                    <option value="{{$j->kode_jabatan}}">{{$j->nama_jabatan}}</option>                                    
                                @endforeach
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
    <br><br>
    <div class="row">
        <div class="col">
            <table id="data-table" class="table">
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
                @if(count($dataJabatan) > 0)
                    @foreach ($dataJabatan as $j)
                        <tr>
                            <th scope="row">{{$j->nik}}</th>
                            <td>{{$j->nama_karyawan}}</td>
                            <td>{{$j->nomor_telepon}}</td>
                            <td>{{$j->jabatan}}</td>
                            <td>{{$j->email}}</td>
                            <td><a>Ubah</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="6">Data Karyawan belum tersedia di sistem</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection