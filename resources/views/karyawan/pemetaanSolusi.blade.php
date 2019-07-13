@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Jenis Keluhan</legend>
                <form action="/jenis-keluhan" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Keluhan</label>
                        <div class="col-lg-6">
                            <input type="text" maxlength="40" class="form-control" name="jenis_keluhan" >
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Add">
                </form>
            </fieldset>
            <br>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID Keluhan</th>
                                <th scope="col">Jenis Keluhan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($dataJenisKeluhan) > 0)
                            @foreach ($dataJenisKeluhan as $jk)
                                <tr>
                                    <th scope="row">{{$jk->kode_jenis_keluhan}}</th>
                                    <td>{{$jk->jenis_keluhan}}</td>
                                    <td><a href="">Hapus</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="3">Data Jenis Keluhan belum tersedia di sistem</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Jenis Solusi</legend>
                <form action="/jenis-solusi" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Form Jenis Solusi</label>
                        <div class="col-lg-6">
                            <input type="text" maxlength="40" class="form-control" name="jenis_solusi" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Jenis Keluhan</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="id_jenis_keluhan">
                            @foreach ($dataJenisKeluhan as $jk)
                                <option value="{{$jk->kode_jenis_keluhan}}">{{$jk->jenis_keluhan}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Add">
                </form>
            </fieldset>
            <br>
            <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID Jenis Solusi</th>
                                    <th scope="col">Jenis Solusi</th>
                                    <th scope="col">ID Jenis Keluhan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($dataJenisSolusi) > 0)
                                @foreach ($dataJenisSolusi as $js)
                                    <tr>
                                        <th scope="row">{{$js->kode_jenis_solusi}}</th>
                                        <td>{{$js->jenis_solusi}}</td>
                                        <td>{{$js->kode_jenis_keluhan}} - {{$js->jenis_keluhan->jenis_keluhan}}</td>
                                        <td><a href="">Hapus</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr><td colspan="4">Data Jenis Keluhan belum tersedia di sistem</td></tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection