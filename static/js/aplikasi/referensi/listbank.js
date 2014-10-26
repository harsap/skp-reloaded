$(document).ready(function() {
    grid();
});


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
            "sAjaxSource":  getbasepath()+"/bank/json/listjsonbank",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                  {name: "bank", value: $('#namabank').val()}
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
                var isceked = aData['isAktif'] == '1'?'checked':'';
                var cekaktif = "<input type='checkbox' name='isaktif"+index+"' id='isaktif"+index+"' disabled  "+isceked+" />"
                var pilih="<a class='icon-edit' href='"+getbasepath()+"/bank/updatebank/"+aData['idBank']+"'  ></a> - <a class='icon-remove' href='"+getbasepath()+"/bank/delbank/"+aData['idBank']+"' ></a>"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(4)', nRow).html(cekaktif );
                $('td:eq(5)', nRow).html(pilih );
                
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idBank", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeBank", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaBank", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "rekeningBank", "bSortable": false, sClass: "center"}, 
                {"mDataProp": "isAktif", "bSortable": false, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idBank", "bSortable": false, sClass: "center"}
            ]
        });
      $("div.top").html("<a  href='"+getbasepath()+"/bank/addbank' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}