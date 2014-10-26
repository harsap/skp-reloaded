function gridurusan(urljson) {
    $("#skpdtable").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#skpdtable').dataTable({
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
            "aaSorting": [[2, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(

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
                var textnamaurusan = "<input type='hidden' id='namaProgram" + aData['idRefProgram'] + "' value='" + aData['namaProgram'] + "' />"

                $('td:eq(0)', nRow).html(index);
                $('td:eq(2)', nRow).html(textnamaurusan + aData['namaProgram']);
                $('td:eq(3)', nRow).html("<span class='icon-ok-sign linkpilihan' onclick='ambilurusan(" + aData['idRefProgram'] + ")'></span>");
                return nRow;

            },
            "aoColumns": [
                {
                    "mDataProp": "idRefProgram",
                    "bSortable": false,
                    sClass: "center"
                },
                {
                    "mDataProp": "kodeUrusan",
                    "bSortable": true,
                    sDefaultContent: "-"
                },
                {
                    "mDataProp": "namaProgram",
                    "bSortable": true,
                    sDefaultContent: "-"
                },
                {
                    "mDataProp": "idRefProgram",
                    "bSortable": false,
                    sClass: "center"
                }
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}

function tampil(urljson) {
    gridurusan(urljson);

}

