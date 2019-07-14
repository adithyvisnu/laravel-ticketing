@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Jangka Waktu</legend>
                <form action="">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="tanggal_mulai" >
                        </div>
                        <div class="col"></div>
                        <label class="col-lg-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-lg-3">
                            <input type="date" class="form-control" name="tanggal_selesai" >
                        </div>
                    </div>
                    <a href="/karyawan/download/tiket" class="btn btn-success float-right" target="_blank">Download</a>
                </form>
            </fieldset>
        </div>
    </div>
<script src="{{ asset('js/forms.js')}}"></script>
@endsection