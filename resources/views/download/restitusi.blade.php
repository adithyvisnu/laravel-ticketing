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
			LAPORAN RESTITUSI BULANAN
			<br>
			Periode: 
			@php
				echo date('F Y');
			@endphp
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
			<table class="table">
				<thead class="">
					<tr>
						<th scope="col">Service ID</th>
						<th scope="col">Nama Layanan</th>
						<th scope="col">Konfigurasi</th>
						<th scope="col">Alamat</th>
						<th scope="col">SLG</th>
						<th scope="col">AV</th>
						<th scope="col">Jumlah Kompensasi</th>
					</tr>
				</thead>
				<tbody>
                    @php
                        // get total sec in one month
                        // thanks to https://stackoverflow.com/questions/7651263/subtract-1-day-with-php
                        $create = date_create(date('Y')."-".date('m')."-"."01");
                        date_add($create,date_interval_create_from_date_string("1 month"));
                        $total_day = date('d',(strtotime ( '-1 day' , strtotime ( $create->format('Y-m-d') ) ) ));
                        $total_sec = $total_day * 60 * 60 * 24;
                    @endphp
                    @if(count($dataDetilKontrak) > 0)
                        @foreach ($dataDetilKontrak as $k)
                            <tr>
                                <th scope="row">{{$k->kode_service_id}}</th>
                                <td>{{$k->layanan->nama_layanan}}</td>
                                <td width="20%">{{$k->layanan->konfigurasi_layanan}}</td>
                                <td>{{$k->alamat}}</td>
                                <td>
                                    {{$k->kontrak->level_garansi_layanan}}% 
                                </td>
                                <td>
                                    @php
                                        $total_time = 0;
                                    @endphp
                                    @foreach ($k->tiket as $t)
                                        @php
                                            // thanks to https://stackoverflow.com/questions/3176609/calculate-total-seconds-in-php-dateinterval
                                            $date_awal = date_create($t->tanggal_waktu_buat);
                                            $date_akhir = date_create($t->tanggal_waktu_selesai);
                                            $total_time = $date_akhir->getTimestamp() - $date_awal->getTimestamp();
                                        @endphp
                                    @endforeach
                                    @php
                                        $percentage = (($total_sec - $total_time) / $total_sec) * 100;
                                    @endphp
                                    {{ number_format((float)$percentage, 2, '.', '') }}%
                                </td>
                                @php
                                    $selisih = $k->kontrak->level_garansi_layanan - $percentage;
                                    if ($selisih < 0) {
                                    } else {
                                        $selisih = 100 - $selisih;
                                        $selisih = number_format((float)abs($selisih), 2, '.', '');
                                    }
                                @endphp
                                <td>
                                    @php
                                    if ($selisih < 0) {
                                        echo '-';
                                    } else {
                                        $selisih = 100 - $selisih;
                                        $restitusi = ($selisih/100) * $k->layanan->harga;
                                        echo "Rp ".number_format($restitusi);
                                    }
                                    @endphp
                                </td>  
                            </tr>
                        @endforeach
                    @else
                        <tr><th>Belum ada langganan layanan</th></tr>
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