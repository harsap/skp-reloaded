$(document).ready(function() {
    gridrekananlist();
});


function gridrekananlist( ) {
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
            "sAjaxSource":  getbasepath()+"/rekanan/json/listjsonrekanan",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                  {name: "rekanan", value: $('#namarekan').val()}
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
                var pilih="<a class='icon-edit' href='"+getbasepath()+"/rekanan/uprekanan/"+aData['idRekanan']+"'  ></a> - <a class='icon-remove' href='"+getbasepath()+"/rekanan/delrekanan/"+aData['idRekanan']+"' ></a>"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(7)', nRow).html(pilih );
                
                return nRow;
            },
         
            "aoColumns": [
                {"mDataProp": "idRekanan", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idRekananAkte", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaDirekturRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idRekananNpwp", "bSortable": false}, 
                {"mDataProp": "alamatRekanan", "bSortable": false, sDefaultContent: "-"},
               {"mDataProp": "idRekanan", "bSortable": false, sClass: "center"}
            ]
        });
      $("div.top").html("<a  href='"+getbasepath()+"/rekanan/addrekanan' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}