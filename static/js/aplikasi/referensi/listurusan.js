$(document).ready(function() {
    grid();
});

function ambilurusan(id) {
    $('#idUrusan', window.parent.document).val(id).change();
    $('#kodeUrusan', window.parent.document).html($("#urusanId" + id).val()+'-'+ $(".urusanNama" + id).val());
    parent.$.fancybox.close();
}
function grid( ) {
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
            "sAjaxSource": getbasepath() + "/program/json/listurusanjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "urusan", value: $('#urusan').val()}
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
                var cekaktif = "<input type='checkbox' name='isaktif" + index + "' id='isaktif" + index + "' disabled  " + isceked + " />"
                var kour = "<input type='hidden' id='urusanId" + aData['idUrusan'] + "' value='" + aData['kodeUrusan'] + "'/>  "
                var rouk = "<input type='hidden' class='urusanNama" + aData['idUrusan'] + "' value='" + aData['namaUrusan'] + "'/>  "
                var pilih = "<span class='icon-ok-sign linkpilihan' onclick='ambilurusan(" + aData['idUrusan'] + ")'></span>  "
                $('td:eq(0)', nRow).html(index);

                $('td:eq(3)', nRow).html(rouk+kour + pilih);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idUrusan", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeUrusan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaUrusan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idUrusan", "bSortable": false, sClass: "center"}
            ]
        });
        $("div.top").html("<a right'></a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}