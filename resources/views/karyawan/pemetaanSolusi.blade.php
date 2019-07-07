@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Jenis Keluhan</legend>
                <form action="">
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Jaringan Tidak Stabil</td>
                                <td><a href="">Hapus</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Jenis Solusi</legend>
                <form action="">
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
                                <option value="1">Jaringan Tidak Stabil</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Jaringan Tidak Stabil</td>
                                    <td>4</td>
                                    <td><a href="">Hapus</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection