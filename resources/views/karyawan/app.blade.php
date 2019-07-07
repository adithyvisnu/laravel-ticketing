<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Ticketing Helpdesk - V1.0.0</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2" style="border-right:1px solid cadetblue; height:100%;">
                <br>
                <br>
                <br>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background: ">
                    <a href="/karyawan/tiket" class="nav-link @if ($menu == 'tiket') active @endif">Tiket Gangguan</a>
                    <a href="/karyawan/aktivasi" class="nav-link @if ($menu == 'aktivasi') active @endif">Aktivasi Pelanggan</a>
                    <a href="/karyawan/pembayaran/restitusi" class="nav-link @if ($menu == 'bayarRestitusi') active @endif">Pembayaran Restitusi</a>
                    <a href="/karyawan/pemetaan-solusi" class="nav-link @if ($menu == 'solusiKeluhan') active @endif">Pemetaan Solusi-Keluhan</a>
                    <a href="/karyawan/laporan/tiket" class="nav-link @if ($menu == 'lapTiket') active @endif">Laporan Tiket</a>
                    <a href="/karyawan/laporan/restitusi" class="nav-link @if ($menu == 'lapRestitusi') active @endif">Laporan Restitusi</a>
                </div>
                <div class="position-absolute" style="margin-bottom: 0%;padding:10px">
                    <a class="btn btn-info" style="bottom:0; margin-bottom: 10%"> Logout </a>
                </div>
            </div>  
            <div class="col-10 p-5">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('js/datatables.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        } );
    </script>
</body>
</html>