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
                    <a href="/pelanggan/layanan" class="nav-link @if ($menu == 'layanan') active @endif">Layanan</a>
                    <a class="nav-link disabled">Data Transaksi</a>
                    <a style="padding-left:40px;" href="/pelanggan/tiket-gangguan" class="nav-link @if ($menu == 'tiket') active @endif">Tiket Gangguan</a>
                    <a class="nav-link disabled">Data Laporan</a>
                    <a style="padding-left:40px;" href="/pelanggan/laporan/layanan" class="nav-link @if ($menu == 'lapLayanan') active @endif">Laporan Layanan</a>
                    <a style="padding-left:40px;" href="/pelanggan/laporan/restitusi" class="nav-link @if ($menu == 'lapRestitusi') active @endif">Laporan Restitusi</a>
                </div>
                <div class="position-absolute" style="margin-top: 100%;padding:10px">
                    <a href="/logout" class="btn btn-info" style="bottom:0; margin-bottom: 10%"> Logout </a>
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