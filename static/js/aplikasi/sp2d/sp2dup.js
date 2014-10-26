$(document).ready(function() {
    gridsppup();

});
function gridsppup() {
    var urljson = getbasepath() + "/sp2d/json/getlistsp2d";
    if (typeof myTable == 'undefined') {
        myTable = $('#btlspdtable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "bScrollCollapse": true,
            "bFilter": false,
            "sAjaxSource": urljson,
            "aaSorting": [[2, "asc"]],
            "fnDrawCallback": function() {
                //   $(".inputmoney").priceFormat({prefix: "", suffix: "", centsSeparator: ",", thousandsSeparator: ".", limit: 15});
            },
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "idskpd", value: $('#idskpd').val()},
                {name: "namaskpd", value: $('#skpd').val()},
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
                var edit = "<a href='" + getbasepath() + "/sp2d/editspdd/" + aData['idspm'] + "'  title='Klik disini untuk melakukan entry SP2D' class='icon-edit' ></a>";
                $('td:eq(0)', nRow).html(index);
                $('td:eq(6)', nRow).html(aData['nomorSp2d'] == 0 ? '-' : aData['nomorSp2d']);
                $('td:eq(7)', nRow).html(accounting.formatNumber(aData['nilaiSp2d']));
                $('td:eq(8)', nRow).html(edit);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idSp2d", "bSortable": false, sClass: "center"},
                {"mDataProp": "tahun", "bSortable": true, sClass: "center"},
                {"mDataProp": "skpd.namaSkpd", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "noSpm", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kodeBeban", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kodeJenis", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "nomorSp2d", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "nilaiSp2d", "bSortable": true, sDefaultContent: "-", sClass: "right"},
                {"mDataProp": "idSp2d", "bSortable": false, sClass: "center"}
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }

}

function pindahhalamanadd() {
    var idskpd = $.trim($("#idskpd").val());
    if (idskpd) {
        window.location.replace(getbasepath() + "/sppup/addspppup/" + idskpd);
    } else {
        window.location.replace(getbasepath() + "/sppup/addspppup");
    }

}

