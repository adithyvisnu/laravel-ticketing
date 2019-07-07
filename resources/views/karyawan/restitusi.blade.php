@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-1">
                <legend>Submit Tiket Gangguan</legend>
                <form action="">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Ticket ID</label>
                        <div class="col-lg-6">
                            <input type="text" readonly maxlength="40" class="form-control" name="id_ticket" >
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-lg-3 col-form-label">Service ID</label>
                        <div class="col-lg-6">
                            <select class="form-control" name="service_id">
                                <option value="1">Manager</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
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
                    <div class="form-group row">                    
                        <label class="col-lg-3 col-form-label">Keluhan</label>
                        <div class="col-lg-6">
                            <textarea maxlength="255" class="form-control"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Buat Tiket Gangguan">
                </form>
            </fieldset>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Close Tiket Gangguan</legend>
                    <form action="">
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Tiket ID</label>
                            <label class="col-lg-3 col-form-label">IN1001929</label>
                            <label class="col-lg-2 col-form-label">Service ID</label>
                            <label class="col col-form-label">442003992-1299101</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jenis Keluhan</label>
                            <label class="col col-form-label">Jaringan Tidak Stabil</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Keluhan</label>
                            <label class="col col-form-label">Sering kali down dalam akses yang banyak</label>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <img src="" alt="Image Upload Preview" style="min-width:150px; min-height:150px; border:1px solid #eee" id="preview">
                                <input type="file" name="bukti_close" alt="Upload Bukti Close Tiket" onchange="showThumbnail(this);">
                            </div>
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
                        <th scope="col">Tiket ID</th>
                        <th scope="col">Service ID</th>
                        <th scope="col">Jenis Keluhan</th>
                        <th scope="col">Open Time</th>
                        <th scope="col">Solution Time</th>
                        <th scope="col">Close Time</th>
                        <th scope="col">PIC</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">IN1001929</th>
                        <td>442003992-1299101</td>
                        <td>Jaringan Tidak Stabil</td>
                        <td>20 April 2019 6.04 PM</td>
                        <td>20 April 2019 6.12 PM</td>
                        <td>20 April 2019 6.14 PM</td>
                        <td>Munadi</td>
                        <td><a>Open Tiket</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection