function gridprogramlist(urljson) {

    if (typeof myTable == 'undefined') {
        console.log(" urljson " + urljson)
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
            "aaSorting": [[0, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "id", value: $('#idskpd').val()}
                );
            },
            "fnServerData": function(sSource, aoData, fnCallback) {
                $.ajax({
                    "dataType": 'json',
                    "type": "POST",
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback
                });
            },
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull, oSettings) {
                var numStart = this.fnPagingInfo().iStart;
                var index = numStart + iDisplayIndexFull + 1;
                var textnamaskpd = "<input type='hidden' id='namaProgram" + aData['idRefProgram'] + "' value='" + aData['namaProgram'] + "' />"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(1)', nRow).html(getTanggal(aData['tglSpd']));
                $('td:eq(2)', nRow).html(accounting.formatNumber(aData['nilaiSpd']));
                //var objekedit = "<a   class='icon-edit linkpilihan' href=" + urledit + "/" + aData['idRefProgram'] + " '></a>";
                //var objekdel = "<a   class='icon-remove linkpilihan' href=" + urldel + "/" + aData['idRefProgram'] + "></a>";

                // $('td:eq(4)', nRow).html(textnamaskpd + objekedit + " - " + objekdel);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idRefProgram", "bSortable": true, sClass: "center"},
                {"mDataProp": "kodeProgram", "bSortable": true, sClass: "center", sDefaultContent: "-"},
                {"mDataProp": "kodeProgram", "bSortable": true, sClass: "center", sDefaultContent: "-"},
                {"mDataProp": "namaProgram", "bSortable": true},
                {"mDataProp": "idRefProgram", "bSortable": false, sClass: "center"}
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


