$(document).ready(function () {
    tampil();
    cari();
});
$(document).keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        tampil();
    }
});

function tampil() {
    grid(getbasepath() + 'formskp/pejabatcontroller/caripejabatjson', getbasepath());
}

function grid(varurl, baseurl) {
    if (typeof pejabattable == 'undefined') {
        var pejabattable = $('#pejabattable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "fnServerParams": function (aoData) {
                var golonganarr = [];
                var eselonarr = [];
                $('#golonganfilter :selected').each(function (i, selected) {
                    golonganarr[i] = $(selected).val();
                });
                $('#eselonfilter :selected').each(function (i, selected) {
                    eselonarr[i] = $(selected).val();
                });
                aoData.push({name: "struk", value: $("#jenisjabatan").val() == 2 ? 2 : '-'},
                {name: "fu", value: $("#jenisjabatan").val() == 4 ? 4 : '-'},
                {name: "ft", value: $("#jenisjabatan").val() == 3 ? 3 : '-'},
                {name: "nip", value: $('#nipfilter').val()},
                {name: "nama", value: $('#namafilter').val()},
                {name: "jabatan", value: $('#jabatanfilter').val()},
                {name: "golongan", value: golonganarr},
                {name: "eselon", value: eselonarr},
                {name: "instansi", value: $('#instansifilter').val()}
                );
            },
            "bFilter": false,
            "sAjaxSource": varurl,
            "fnServerData": function (sSource, aoData, fnCallback) {
                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
            "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                var linkdetail = "<a href='" + baseurl + "index.php/personil/personildata/detailpersonil/" + $("#jenisjabatan").val() + "/" + aData['peg_id'] + "' >" + aData['nama_lengkap'] + "</a>"
                $('td:eq(0)', nRow).html(linkdetail);
                var pilih = "<a href='#' class='icon-check' onclick=pilih(" + aData['peg_id'] + ")  title='klik untuk memilih pejabat' ></a>";
                $('td:eq(6)', nRow).html(pilih);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "nama_lengkap", "bSortable": true},
                {"mDataProp": "peg_nip_baru", "bSortable": true},
                {"mDataProp": "jabatan_nama", "bSortable": true},
                {"mDataProp": "golongan_nama", "bSortable": true},
                {"mDataProp": "eselon_nm", "bSortable": true},
                {"mDataProp": "satuan_kerja_nama"},
                {"mDataProp": "peg_id", sClass: "center", "bSortable": false}

            ]
        });

    }
    else {
        pejabattable.fnClearTable(0);
        pejabattable.fnDraw();
    }


}

function pilih(id) {
    $.post(getbasepath() + "formskp/pejabatcontroller/getpegawaibyidjson", {"idpeg": id}, function (data) {
        console.log(data.nama_lengkap);
        $("#hiddenidpjabatpenilai", window.parent.document).val(data.peg_id);
        $("#txtnamapejabatpenilai", window.parent.document).html(data.nama_lengkap);
        $("#txtnippejabatpenilai", window.parent.document).html(data.peg_nip_baru);
        $("#txtjabatan", window.parent.document).html(data.jabatan_nama);
        $("#txtpangkat", window.parent.document).html(data.nm_gol_akhir+"/"+data.nm_pkt_akhir);
        var unit_cabang = data.unit_kerja_nama;
        if(data.cabang_dinas != '' && data.cabang_dinas != 'null' && data.cabang_dinas != null) unit_cabang = data.cabang_dinas;            
        $("#txtunitkerja", window.parent.document).html( unit_cabang+ " - " + data.satuan_kerja_nama);
    }, "json");
    
  parent.$.fancybox.close();
}
function cari() {
    $("#golonganfilter").multiselect({
        minWidth: 125,
        checkAllText: 'Check all',
        uncheckAllText: 'Uncheck all',
        noneSelectedText: 'Pilih Data',
        selectedText: '# telah dipilih'

    });

    $("#eselonfilter").multiselect({
        minWidth: 125,
        checkAllText: 'Check all',
        uncheckAllText: 'Uncheck all',
        noneSelectedText: 'Pilih Data',
        selectedText: '# telah dipilih'

    });

    $('#nipfilter').on('keyup', function (event) {
        var panjang = parseInt($(this).val().length);
        // var keycode = (event.keyCode ? event.keyCode : event.which);
        if (/*keycode == '13' &&*/ panjang > 3) {
            tampil();
        }
    });
    $('#namafilter').on('keyup', function (event) {
        var panjang = parseInt($(this).val().length);
        // var keycode = (event.keyCode ? event.keyCode : event.which);
        if (/*keycode == '13' &&*/ panjang > 3) {
            tampil();
        }
    });
    $('#jabatanfilter').on('keyup', function (event) {
        var panjang = parseInt($(this).val().length);
        if (panjang > 3) {
            tampil();
        }
    });
    $('#instansifilter').on('keyup', function (event) {
        var panjang = parseInt($(this).val().length);
        if (panjang > 3) {
            tampil();
        }
    });
}
