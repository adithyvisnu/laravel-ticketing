
// https://codepen.io/mobifreaks/pen/LIbca    
function showThumbnail(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('#preview').css( "maxWidth", "150px");
            $('#preview').css( "maxHeight", "150px");
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function set_harga_and_konfigurasi(){
    var kode_layanan = $('#layanan').val();
    var data_layanan = kode_layanan.split("|");
    $('#harga').text(data_layanan[1]);
    $('#konfigurasi').text(data_layanan[2]);
}

function hitung_harga(){
    var total = 0;
    $('td.harga').each(function() {
        var cellText = $(this).text();
        total = total + parseInt(cellText)
    });
    $('#total').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(total));
}

function add_detil_service(){
    var kode_layanan = $('#layanan').val();
    var alamat = $('#alamat').val();
    var count = $('#count').val();
    document.getElementById("count").stepUp(1);
    $('#detil_service').append('<input type="text" hidden readonly name="layanan[]" value="'+kode_layanan+'" id="layanan'+count+'">')
    $('#detil_service').append('<input type="text" hidden readonly name="alamat[]" value="'+alamat+'" id="alamat'+count+'"/>')
    $('#detil_layanan').append(
        `
        <tr id='data_layanan-`+count+`'>
            <th scope="row">`+$('#layanan option:selected').html()+`</th>
            <td>`+alamat+`</td>
            <td class="harga">`+$('#harga').text()+`</td>
            <td>`+$('#konfigurasi').text()+`</td>
            <td><a onclick="hapus_layanan(`+count+`)">Hapus</a></td>
        </tr>
        `
    );
    hitung_harga();
}

function hapus_layanan(id) {
    $('#data_layanan-'+id).remove();
    $('#layanan-'+id).remove();
    $('#alamat-'+id).remove();
    hitung_harga();
}

function cek_data_layanan(){
    if($('#all_data_layanan tbody tr').length === 0) {
        return
    }
}

function add_detil_solusi(){
    if($('#list_jenis_solusi option:selected').html() == undefined) {
        return
    }
    var kode_jenis_solusi = $('#list_jenis_solusi').val();
    var keterangan_solusi = $('#keterangan_solusi').val();
    console.log(kode_jenis_solusi, keterangan_solusi);
    var count = $('#count').val();
    document.getElementById("count").stepUp(1);
    $('#list_solusi').append('<input type="text" hidden readonly name="kode_jenis_solusi[]" value="'+kode_jenis_solusi+'" id="kode_jenis_solusi'+count+'">')
    $('#list_solusi').append('<input type="text" hidden readonly name="keterangan_solusi[]" value="'+keterangan_solusi+'" id="keterangan_solusi'+count+'"/>')
    $('#detil_solusi').append(
        `
        <tr id='data_solusi-`+count+`'>
            <th scope="row">`+$('#list_jenis_solusi option:selected').html()+`</th>
            <td class='solusi'>`+keterangan_solusi+`</td>
            <td><a href="#" onclick="hapus_solusi(`+count+`)">Hapus</a></td>
        </tr>
        `
    );
}

function hapus_solusi(id) {
    $('#data_solusi-'+id).remove();
    $('#kode_jenis_solusi'+id).remove();
    $('#keterangan_solusi'+id).remove();
}

function get_tiket_ba_solusi(id){
    $.ajax({
        type:'GET',
        url:'/ticket/'+id,
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {
            $('input[name=kode_tiket]').val(data.kode_tiket);
            $('#kode_tiket_solusi').text(data.kode_tiket);
            $('#service_id_solusi').text(data.kode_service_id);
            $('#jenis_keluhan_solusi').text(data.jenis_keluhan.jenis_keluhan);
            $('#keterangan_keluhan_solusi').text(data.keterangan_keluhan);
            data.jenis_solusi.forEach(element => {
                $('#list_jenis_solusi').append($('<option>', { 
                    value: element.kode_jenis_solusi,
                    text : element.jenis_solusi 
                }));
            });
        }
    });
}

function cek_solusi(){
    var total_solusi = 0;
    $('td.solusi').each(function() {
        total_solusi++;
    });
    if(!(total_solusi > 0)) {
        $("form").submit(function(e){
            e.preventDefault();
        });
    }
    // alert(total_solusi)
    return confirm('Yakin submit Berita Acara Solusi?', function(result) {
        if(result) {
                form.submit();
            }
        }
    );
}

function close_tiket(id) {
    $.ajax({
        type:'GET',
        url:'/ticket/'+id,
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data) {
            $('#kode_tiket_close').text(data.kode_tiket);
            $('#service_id_close').text(data.kode_service_id);
            $('#jenis_keluhan_close').text(data.jenis_keluhan.jenis_keluhan);
            $('#keterangan_keluhan_close').text(data.keterangan_keluhan);
            $('input[name=kode_tiket]').val(data.kode_tiket);
        }
    });
}