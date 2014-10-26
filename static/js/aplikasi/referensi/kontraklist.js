$(document).ready(function() {
    gridkontrak();
});

function gridkontrak() {
    $("#fungsitable").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#fungsitable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "sDom": '<"top"i>irt<"bottom"flp><"clear">',
            "bScrollCollapse": true,
            "bFilter": false,
            "sAjaxSource": getbasepath() + "/kontrak/json/getlistkontrak",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "namaskpd", value: $('#skpd').val()},
                {name: "tahun", value: $('#tahun').val()},
                {name: "kodemetode", value: $('#kodeMetode').val()},
                {name: "rekanan", value: $('#rekanan').val()},
                {name: "nilai1", value: $('#nilai1').val()},
                {name: "nilai2", value: $('#nilai2').val()},
                {name: "tglmulai", value: $('#tglmulai').val()},
                {name: "tglakhir", value: $('#tglakhir').val()}

                );
            },
            "fnServerData": function(sSource, aoData, fnCallback) {
                $.ajax({
                    "dataType": 'json',
                    "type": "GET",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull, oSettings) {
                var numStart = this.fnPagingInfo().iStart;
                var index = numStart + iDisplayIndexFull + 1;
                var pilih = "<a class='icon-edit' href='" + getbasepath() + "/kontrak/updatekontrak/" + aData['idKontrak'] + "'  ></a> - <a class='icon-remove' href='" + getbasepath() + "/kontrak/delkontrak/" + aData['idKontrak'] + "' ></a>";
                $('td:eq(0)', nRow).html(index);
                $('td:eq(6)', nRow).html(accounting.formatNumber(aData['nilaiKontrak'], 2, '.', ","));
                $('td:eq(7)', nRow).html(pilih);

                return nRow;

            },
            "aoColumns": [
                {"mDataProp": "idKontrak", "bSortable": false, sClass: "-"},
                {"mDataProp": "noKontrak", "bSortable": true, sClass: "-"},
                {"mDataProp": "noSpd", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kegiatan.namaKegiatan", "bSortable": true, sClass: "-", sDefaultContent: "-"},
                {"mDataProp": "metode.kodeMetode", "bSortable": true, sClass: "-", sDefaultContent: "-"},
                {"mDataProp": "namaRekanan", "bSortable": false, sClass: "-"},
                {"mDataProp": "nilaiKontrak", "bSortable": false, sClass: "kanan"},
                {"mDataProp": "idKontrak", "bSortable": false, sClass: "center"}

            ]
        });
        $("div.top").html("<a   style='float: right'></a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}