<?php
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticketing Helpdesk - V1.0.0</title>
</head>
<body style="font-size:10pt">
	<div>
		<div>logo</div>
		<div>PT. Telkom Indonesia <br> <br> Gedung Menara Multimedia, Jl. Kebon Sirih no <br>10-12, Jakarta Pusat, DKI Jakarta. <br>Kode Pos 10110</div>
	</div>
	<br><hr>
	<div>
		<div class="col text-center" style="font-weight: bold">
			<br>
			LAPORAN TIKET
			<br>
		</div>
	</div>
	<div style="font-weight: bold">
		<div>ID Pelanggan: <br>Nama Pelanggan: <br><br></div>
		<div></div>
		<div></div>
		<div>Total Restitusi:</div>
	</div>
	<div>
		<div>
            @php
                // get total sec in one month
                // thanks to https://stackoverflow.com/questions/7651263/subtract-1-day-with-php
                $create = date_create(date('Y')."-".date('m')."-"."01");
                date_add($create,date_interval_create_from_date_string("1 month"));
                $total_day = date('d',(strtotime ( '-1 day' , strtotime ( $create->format('Y-m-d') ) ) ));
                $total_sec = $total_day * 60 * 60 * 24;
            @endphp
			<table class="table">
				<thead class="">
                    <tr>
                        <th scope="col">Tiket ID</th>
                        <th scope="col">Service ID</th>
                        <th scope="col">Jenis Keluhan</th>
                        <th scope="col">Open Time</th>
                        <th scope="col">Solution Time</th>
                        <th scope="col">Close Time</th>
                        <th scope="col">PIC</th>
                    </tr>
				</thead>
				<tbody>
                    @if(count($dataTiket) > 0)
                        @foreach ($dataTiket as $t)
                        <tr id="tiket-{{$t->kode_tiket}}">
                            <th scope="row">{{$t->kode_tiket}}</th>
                            <td>{{$t->kode_service_id}}</td>
                            <td>{{$t->jenis_keluhan->jenis_keluhan}}</td>
                            <td>{{$t->tanggal_waktu_buat}}</td>
                            <td>
                                @if(!is_null($t->ba_solusi))
                                    {{$t->ba_solusi->tanggal_ba_solusi}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if(!is_null($t->ba_selesai))
                                    {{$t->ba_selesai->tanggal_ba_selesai}}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                Adithya Visnu
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr><td colspan="8">Data Tiket tidak tersedia di sistem</td></tr>
                    @endif
                </tbody>
			</table>
		</div>
	</div>
	<br><br>
	<div>
		<div style="font-style:italic;font-size:0.9em">
			Keterangan: <br>
			*TTR (Time To Resolve)<br>
			*SLG (Level Garansi Layanan)<br>
			*AV (Ketersediaan Layanan)<br>
			Total detik per bulan : {{$total_sec}}
		</div>
		<div></div>
		<div></div>
		<div>
			Jakarta, {{date('d F Y')}} <br> 
			Manager Service Level Guarantee 
			<br><br><br><br>
			<br><br><br><br>
			(...................................................................)
		</div>
	</div>
</body>
</html>