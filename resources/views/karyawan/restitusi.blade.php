@extends('karyawan.app')

@section('content')
    <h1 class="display-4">{{$title}}</h1>
    <div class="row">
        <div class="col">
            <fieldset class="border p-3">
                <legend>Filter Data Resitusi</legend>
                <form action="">
                    <div class="form-group row">
                        <label class="col-4 col-form-label">Pelanggan</label>
                        <div class="col-8">
                            <input type="text" maxlength="40" class="form-control" name="id_ticket" >
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-4 col-form-label">Kontrak</label>
                        <div class="col-8">
                            <select class="form-control" name="id_kontrak">
                                <option value="1">KTel/2018/08/19</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label class="col-4 col-form-label">Periode</label>
                        <div class="col-8">
                            <select class="form-control" name="id_jenis_keluhan">
                                <option value="201901">Januari 2019</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success float-right" value="Filter">
                </form>
            </fieldset>
            <br>
            <div class="row">
                <div class="col">
                    Total Restitusi 
                    <h1 class="display-5">Rp {{number_format(11111111 * 11) }}</h1>
                </div>
                <div class="col-5">
                    Rata-rata SLG
                    <h1 class="display-5">Rp {{number_format(98.7) }}%</h1>
                </div>
            </div>
        </div>
        <div class="col">
            <fieldset class="border p-3">
                <legend>Form Bukti Transfer Restitusi</legend>
                    <form action="">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Pelanggan</label>
                            <div class="col-8">
                                <input type="text" maxlength="40" class="form-control" name="id_ticket" >
                            </div>
                        </div>
                        <div class="form-group row">                    
                            <label class="col-4 col-form-label">Kontrak</label>
                            <div class="col-8">
                                <select class="form-control" name="id_kontrak">
                                    <option value="1">KTel/2018/08/19</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">                    
                            <label class="col-4 col-form-label">Periode</label>
                            <div class="col-8">
                                <select class="form-control" name="id_jenis_keluhan">
                                    <option value="201901">Januari 2019</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Periode</label>
                            <div class="col">
                                <input type="file" name="bukti_close" alt="Upload Bukti Close Tiket">
                            </div>
                        </div>        
                        <div class="form-group row">
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
                        <th scope="col">Service ID</th>
                        <th scope="col">Nama Layanan</th>
                        <th scope="col">Konfigurasi</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">SLG</th>
                        <th scope="col">Aktual Ketersediaan Layanan</th>
                        <th scope="col">Selisih</th>
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
                                <td>
                                    @php
                                        $selisih = $k->kontrak->level_garansi_layanan - $percentage;
                                        if ($selisih < 0) {
                                            echo "0%";
                                        } else {
                                            echo number_format((float)abs($selisih), 2, '.', '')."%";
                                            $selisih = 100 - $selisih;
                                            $selisih = number_format((float)abs($selisih), 2, '.', '');
                                        }
                                    @endphp
                                </td>
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
    
<script src="{{ asset('js/forms.js')}}"></script>
@endsection