$(document).ready(function() {
    grid();
});
function ambilurusan(id) {
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
            "sAjaxSource":  getbasepath()+"/program/json/listprogramjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                  {name: "program", value: $('#namaprogram').val()}
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
            
            
            //edit lagi ntar
            
            
            
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull, oSettings) {
                var numStart = this.fnPagingInfo().iStart;
                var index = numStart + iDisplayIndexFull + 1;
                var isceked = aData['isAktif'] == '1'?'checked':'';
                var cekaktif = "<input type='checkbox' name='isaktif"+index+"' id='isaktif"+index+"' disabled  "+isceked+" />"
                var pilih="<a class='icon-edit' href='"+getbasepath()+"/program/updateprogram/"+aData['idProgram']+"'  ></a> - <a class='icon-remove' href='"+getbasepath()+"/program/deleteprogram/"+aData['idProgram']+"' ></a>"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(4)', nRow).html(cekaktif );
                $('td:eq(5)', nRow).html(pilih );
                
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idProgram", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeProgram", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaProgram", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "urusan.namaUrusan", "bSortable": false, sClass: "center"}, 
                {"mDataProp": "isAktif", "bSortable": false, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idProgram", "bSortable": false, sClass: "center"}
            ]
        });
      $("div.top").html("<a  href='"+getbasepath()+"/program/addprogram' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}