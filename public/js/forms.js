
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