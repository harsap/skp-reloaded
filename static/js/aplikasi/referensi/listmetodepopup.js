$(document).ready(function() {
   grid(); 
});
function ambilmetode(id) {
   $('#kodeMetode', window.parent.document).val(id).change();
   $('#kodeMetode', window.parent.document).val($("#kodeMetode" + id).val());
   $('#ketMetode', window.parent.document).val($("#ketMetode" + id).val());
    parent.$.fancybox.close();
}
function grid( ) {
    var urljson = getbasepath()+"/kontrak/json/listpopupmetode";
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
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "namametode", value: $('#namametode').val()}
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
                var kodeMetode = "<input type='hidden'  id='kodeMetode" + aData['kodeMetode'] + "' value='" + aData['kodeMetode'] + "'/>  "
                var namaMetode = "<input type='hidden'  id='ketMetode" + aData['kodeMetode'] + "' value='" + aData['ketMetode'] + "'/>  "
                var ceklis =  "<span class='icon-ok-sign linkpilihan' onclick=ambilmetode('" + aData['kodeMetode'] + "')></span>";
                $('td:eq(0)', nRow).html(index);
                $('td:eq(3)', nRow).html(kodeMetode + namaMetode + ceklis);
                
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "kodeMetode", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeMetode", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "ketMetode", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kodeMetode", "bSortable": false, sClass: "center"}
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


