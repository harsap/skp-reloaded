$(document).ready(function () {
    ambildatatugas(1);
    ambildatatugas(2);
    getpjabatpenilai();
});

function tugaspokok(id) {
    $("#status").val(id);
}
function submitdata() {
    var pegnip = $("#hiddenidpjabatpenilai").val();
    if (pegnip != '') {
        simpandata( );
    } else {
        bootbox.alert("Pejabat penilai wajib diisi !");
    }
}

function getpjabatpenilai() {
      var varurl = getbasepath() + "skp/pembuatan/getpejabatpenilai/" + $("#nikPegawai").val() + "/" + $("#tahun").val()
    $.post(varurl, {},
            {headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }}, "json").done(
            function (hasil) {
                var data = hasil.datahasil;
                $("#hiddenidpjabatpenilai").val(data.peg_id);
                $("#txtnamapejabatpenilai").html(data.nama_lengkap);
                $("#txtnippejabatpenilai").html(data.peg_nip_baru);
                $("#txtjabatan").html(data.jabatan_nama);
                $("#txtpangkat").html(data.nm_gol_akhir + "/" + data.nm_pkt_akhir);
                var unit_cabang = data.unit_kerja_nama;
                if (data.cabang_dinas != '' && data.cabang_dinas != 'null' && data.cabang_dinas != null)
                    unit_cabang = data.cabang_dinas;
                $("#txtunitkerja").html(unit_cabang + " - " + data.satuan_kerja_nama);
            });
}
function ambildatatugas(status) {
    var varurl = getbasepath() + "skp/pembuatan/gettugas/" + $("#nikPegawai").val() + "/" + $("#tahun").val() + "/" + status;
    $.post(varurl, {},
            {headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }}, "json").done(
            function (data) {
                var html = "";
                $.each(data.datahasil, function (index, arrdata) {
                    html += "<tr>";
                    html += "<td  align='center'>" + eval(index + 1) + "</td>";
                    html += "<td>" + arrdata.deskripsi_kegiatan + "</td>";
                    html += "<td>" + arrdata.nilai_angka_kredit + "</td>";
                    html += "<td>" + arrdata.target_kuantitatif + " " + arrdata.satuan_target_kuantitatif + "</td>";
                    html += "<td>" + arrdata.target_kualitas + " % </td>";
                    html += "<td>" + arrdata.waktu + "  " + arrdata.satuan_waktu + " </td>";
                    html += "<td>" + arrdata.biaya + " Rupiah </td>";
                    html += "<td align='center'>  <span  style='cursor: pointer' href='#' onclick='hapuskpi(" + arrdata.i_seq_wbskpi + ")' >Hapus</span> - <span style='cursor: pointer' href='#' onclick='getdetailkpi(" + arrdata.i_seq_wbskpi + ")' >Ubah</span></td>";
                    html += "</tr>";
                });
                if (status == 1 || status == '1')
                    $("#bodykpi").html(html);
                else if (status == 2 || status == '2')
                    $("#bodykpitambahan").html(html);
            });

}

function simpandata( ) {
    var varurl = getbasepath() + "skp/pembuatan/addpokok";
    var datajab = {
        deskripsi_kegiatan: $("#deskripsi_kegiatan").val(),
        nilai_angka_kredit: $("#nilai_angka_kredit").val(),
        target_kuantitatif: $("#target_kuantitatif").val(),
        satuan_target_kuantitatif: $("#satuan_target_kuantitatif").val(),
        target_kualitas: $("#target_kualitas").val(),
        waktu: $("#waktu").val(),
        satuan_waktu: $("#satuan_waktu").val(),
        biaya: $("#biaya").val(),
        tahun: $("#tahun").val(),
        status: $("#status").val(),
        peg_id: $("#nikPegawai").val(),
        peg_id_atasan: $("#hiddenidpjabatpenilai").val()
    }
    var id_kegiatan = $("#id_kegiatan").val();
    if (id_kegiatan) {
        varurl = getbasepath() + "WBS/WBSSimpanUbahKpiJSON";
        datajab['id_kegiatan'] = id_kegiatan;
    }

    var paramkirim = JSON.stringify(datajab);


    $.post(varurl, {"item": paramkirim},
    {headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }}, "json").done(
            function (data) {
                $('#modal_pokok_jabatan').modal('toggle');
                bootbox.alert(data.output);
                var html = "";
                $.each(data.datahasil, function (index, arrdata) {
                    html += "<tr>";
                    html += "<td  align='center'>" + eval(index + 1) + "</td>";
                    html += "<td>" + arrdata.deskripsi_kegiatan + "</td>";
                    html += "<td>" + arrdata.nilai_angka_kredit + "</td>";
                    html += "<td>" + arrdata.target_kuantitatif + " " + arrdata.satuan_target_kuantitatif + "</td>";
                    html += "<td>" + arrdata.target_kualitas + " % </td>";
                    html += "<td>" + arrdata.waktu + "  " + arrdata.satuan_waktu + " </td>";
                    html += "<td>" + arrdata.biaya + " Rupiah </td>";
                    html += "<td align='center'>  <span  style='cursor: pointer' href='#' onclick='hapuskpi(" + arrdata.i_seq_wbskpi + ")' >Hapus</span> - <span style='cursor: pointer' href='#' onclick='getdetailkpi(" + arrdata.i_seq_wbskpi + ")' >Ubah</span></td>";
                    html += "</tr>";
                });
                if (status == 1 || status == '1')
                    $("#bodykpi").html(html);
                else if (status == 2 || status == '2')
                    $("#bodykpitambahan").html(html);
            });
}
