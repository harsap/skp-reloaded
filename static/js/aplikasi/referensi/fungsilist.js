$(document).ready(function() {
    grid();
});

function ambilfungsi(id) {
   $('#idFungsi', window.parent.document).val(id).change();
   $('#idFungsi', window.parent.document).val($("#idFungsi" + id).val());
   $('#namaFungsi', window.parent.document).val($("#namaFungsi" + id).val());
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
            "sAjaxSource":  getbasepath()+"/urusan/json/listfungsijson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                  {name: "fungsi", value: $('#namafungsi').val()}
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
                var idFungsi = "<input type='hidden' id='idFungsi" + aData['idFungsi'] + "' value='" + aData['idFungsi'] + "' />";
                var namaFungsi = "<input type='hidden' id='namaFungsi" + aData['idFungsi'] + "' value='" +  aData['namaFungsi'] + "' />";
                var cekaktif = "<input type='checkbox' name='isaktif"+index+"' id='isaktif"+index+"' disabled  "+isceked+" />"
                var pilih="<a class='icon-edit' href='"+getbasepath()+"/common/editfungsi/"+aData['idFungsi']+"'  ></a> - <a class='icon-remove' href='"+getbasepath()+"/common/delfungsi/"+aData['idFungsi']+"' ></a>"
                var ceklis =  "<span class='icon-ok-sign linkpilihan'  onclick='ambilfungsi(" + aData['idFungsi'] + ")' ></span>";
                
                $('td:eq(0)', nRow).html(index);
                $('td:eq(3)', nRow).html(cekaktif );
                $('td:eq(4)', nRow).html(idFungsi + namaFungsi + ceklis);
                
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idFungsi", "bSortable": false, sClass: "center"}, 
                {"mDataProp": "kodeFungsi", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaFungsi", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "isAktif", "bSortable": false, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idFungsi", "bSortable": false, sClass: "center"}
            ]
        });
      $("div.top").html("<a  href='"+getbasepath()+"/common/addfungsi' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}