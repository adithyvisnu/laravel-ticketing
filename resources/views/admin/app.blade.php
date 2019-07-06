<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <title>Ticketing Helpdesk - V1.0.0</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3" style="border-right:1px solid cadetblue; height:100%;">
                <br>
                <br>
                <br>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background: ">
                    <a href="/admin/jabatan" class="nav-link @if ($menu == 'jabatan') active @endif">Jabatan</a>
                    <a href="/admin/layanan" class="nav-link @if ($menu == 'layanan') active @endif">Layanan</a>
                    <a href="/admin/karyawan" class="nav-link @if ($menu == 'karyawan') active @endif">Karyawan</a>
                </div>
                <div class="position-absolute" style="margin-bottom: 0%;padding:10px">
                    <a class="btn btn-info" style="bottom:0; margin-bottom: 10%"> Logout </a>
                </div>
            </div>  
            <div class="col-9">
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