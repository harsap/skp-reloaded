$(document).ready(function() {
    grid();
});


function grid( ) {
    $("#basttable").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#basttable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "sDom": '<"top"i>irt<"bottom"flp><"clear">',
            "bScrollCollapse": true,
            "bFilter": false,
            "sAjaxSource": getbasepath() + "/bast/json/listbastjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                {name: "bast", value: $('#namabast').val()},
                {name: "kodeskpd", value: $('#kodeskpd').val()},
                {name: "tahun", value: $('#tahun').val()}
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
                var isceked = aData['isAktif'] == '1' ? 'checked' : '';
                var cekaktif = "<input type='checkbox' name='isaktif" + index + "' id='isaktif" + index + "' disabled  " + isceked + " />";
                var pilih = "<a class='icon-edit' href='" + getbasepath() + "/bast/updatebast/" + aData['idBast'] + "'  ></a> - <a class='icon-remove' href='" + getbasepath() + "/bast/deletebast/" + aData['idBast'] + "' ></a>";

                $('td:eq(0)', nRow).html(index);
                $('td:eq(11)', nRow).html(pilih);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idBast", "bSortable": false, sClass: "center"},
               
                {"mDataProp": "tglBast", "bSortable": false, sClass: "center"}, 
                {"mDataProp": "noBast", "bSortable": false, sClass: "center"},
                {"mDataProp": "kontrak.idKontrak", "bSortable": true, sClass: "center"},
                {"mDataProp": "kegiatan.namaKegiatan", "bSortable": true, sClass: "center"},
                {"mDataProp": "idAkun", "bSortable": false, sClass: "center"},
                {"mDataProp": "nilaiBast", "bSortable": false, sClass: "center"},
                {"mDataProp": "nilaiPrestasi", "bSortable": false, sClass: "center"},
                {"mDataProp": "namaPptk", "bSortable": false, sClass: "center"},
                {"mDataProp": "nipPptk", "bSortable": false, sClass: "center"},
                {"mDataProp": "ketBast", "bSortable": false, sClass: "center"},
                {"mDataProp": "idBast", "bSortable": false, sDefaultContent: "-", sClass: "center"}

            ]
        });
        $("div.top").html("<a  href='" + getbasepath() + "/bast/addbast' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}