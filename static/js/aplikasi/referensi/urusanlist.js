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
            "sAjaxSource": getbasepath() + "/urusan/json/listurusanjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "namaurusan", value: $('#namaurusan').val()}
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
                var cekaktif = "<input type='checkbox' name='isaktif"+index+"' id='isaktif"+index+"' disabled  "+isceked+" />"
                var pilih="<a class='icon-edit' href='"+getbasepath()+"/urusan/upurusan/"+aData['idUrusan']+"'  ></a> - <a class='icon-remove' href='"+getbasepath()+"/urusan/delurusan/"+aData['idUrusan']+"' ></a>"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(4)', nRow).html(cekaktif);
                $('td:eq(5)', nRow).html(pilih );
                

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idUrusan", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeUrusan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaUrusan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "fungsi.namaFungsi", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idUrusan", "bSortable": true, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idUrusan", "bSortable": false, sClass: "center"}
            ]
        });
         $("div.top").html("<a  href='"+getbasepath()+"/urusan/addurusan' class='btn blue' style='float: right'>Tambah Data</a>");
    
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}