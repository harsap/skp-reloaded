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
    grid(getbasepath() + 'index.php/formskp/formskpcontroller/caripegjson', getbasepath());
}

function grid(varurl, baseurl) {
    $("#stattable").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#stattable').dataTable({
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
                var edit = "<a href='"+baseurl+"index.php/skp/pembuatan/index/"+aData['peg_id']+"' class='icon-edit-sign' title='klik disini untuk memasukan data target/sasaran kerja' ></a>";
                var cetak = "<a href='#' class='icon-print' title='klik disini untuk mencetak target/sasaran kerja' ></a>";
                $('td:eq(6)', nRow).html(edit);
                $('td:eq(7)', nRow).html(cetak);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "nama_lengkap", "bSortable": true},
                {"mDataProp": "peg_nip_baru", "bSortable": true},
                {"mDataProp": "jabatan_nama", "bSortable": true},
                {"mDataProp": "golongan_nama", "bSortable": true},
                {"mDataProp": "eselon_nm", "bSortable": true},
                {"mDataProp": "satuan_kerja_nama"},
                {"mDataProp": "peg_id" , sClass: "center"},
                {"mDataProp": "peg_id", sClass: "center"}

            ]
        });

    }
    else {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }


}
function gridpopupjabatan(varurl, baseurl, idjabatan) {
    $("#stattable").show();
    if (typeof myTable == 'undefined') {

        myTable = $('#stattable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "sScrollY": "250px",
            "fnServerParams": function (aoData) {
                aoData.push({name: "jabatan", value: idjabatan}
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
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "nama_lengkap", "bSortable": true},
                {"mDataProp": "peg_nip_baru", "bSortable": true},
                {"mDataProp": "jabatan_nama", "bSortable": true},
                {"mDataProp": "golongan_nama", "bSortable": true},
                {"mDataProp": "eselon_nm", "bSortable": true},
                {"mDataProp": "satuan_kerja_nama"}


            ]
        });
        setTimeout(function ()
        {
            myTable.fnAdjustColumnSizing();
        }, 10);
        $('.dataTable').wrap('<div class="dataTables_scroll" />');
    }
    else {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }


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
