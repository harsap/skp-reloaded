$(document).ready(function() {
    grid();
});
function ambilkontrak(id) {
    $('#idKontrak', window.parent.document).val(id).change();
    $('#idKegiatan', window.parent.document).val(id).change();
    $('#idKegiatan', window.parent.document).val($("#idKegiatan" + id).val());
    $('#idKontrak', window.parent.document).val($("#idKontrak" + id).val());
    $('#namaKegiatan', window.parent.document).val($("#namaKegiatan" + id).val());
    $('#nilaiBast', window.parent.document).val(accounting.formatNumber($("#nilaiBast" + id).val()));
    $('#nilaiKontrak', window.parent.document).val(accounting.formatNumber($("#nilaiKontrak" + id).val()))
    parent.$.fancybox.close();
}
function grid( ) {
    var urljson = getbasepath() + "/bast/json/listpopupkontrak";
    $("#kontrakpopup").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#kontrakpopup').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "bScrollCollapse": true,
            //"sScrollY": ($(window).height() * 108 / 100),
            "bFilter": false,
            "sAjaxSource": urljson,
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "namaskpd", value: $('#skpd').val()},
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
                
                
                var idKontrak = "<input type='hidden' id='idKontrak" + aData['kontrak']['idKontrak'] + "' value='" + aData['kontrak']['idKontrak'] + "' />";
                var idKegiatan = "<input type='hidden' id='idKegiatan" + aData['kontrak']['idKontrak'] + "' value='" + aData['kontrak']['idKegiatan'] + "' />";
                var namaKegiatan = "<input type='hidden' id='namaKegiatan" + aData['kontrak']['idKontrak'] + "' value='" + aData['kegiatan']['namaKegiatan'] + "' />";
                 var nilaiBast = "<input type='hidden' id='nilaiBast" + aData['kontrak']['idKontrak'] + "' value='" + aData['nilaiBast'] + "' />";

                var ceklis = "<span class='icon-ok-sign linkpilihan' onclick='ambilkontrak(" + aData['kontrak']['idKontrak'] + ")'></span>";
                $('td:eq(6)', nRow).html(accounting.formatNumber(aData['nilaiBast']));
                $('td:eq(7)', nRow).html(accounting.formatNumber(aData['nilaiKontrak']));
                $('td:eq(0)', nRow).html(index);
                $('td:eq(8)', nRow).html(idKontrak + idKegiatan + namaKegiatan + nilaiBast + ceklis);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "kontrak.idKontrak", "bSortable": false, sClass: "-"},
                {"mDataProp": "kontrak.idKontrak", "bSortable": false, sClass: "-"},
                {"mDataProp": "tahunAnggaran", "bSortable": true, sClass: "-"},
                {"mDataProp": "kegiatan.namaKegiatan", "bSortable": true, sClass: "-", sDefaultContent: "-"},
                {"mDataProp": "kontrak.noKontrak", "bSortable": false, sClass: "-"},
                {"mDataProp": "skpd.namaSkpd", "bSortable": false, sClass: "-"},
                {"mDataProp": "nilaiBast", "bSortable": false, sClass: "kanan"},
                {"mDataProp": "nilaiKontrak", "bSortable": false, sClass: "kanan"},
                {"mDataProp": "kontrak.idKontrak", "bSortable": false, sClass: "-"}

            ]

        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


