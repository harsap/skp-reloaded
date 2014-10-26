$(document).ready(function() {
   grid(); 
});
function ambilkegiatan(id) {
   $('#idKegiatan', window.parent.document).val(id).change();
   $('#idSpd', window.parent.document).val($("#idSpd" + id).val());
   $('#idKegiatan', window.parent.document).val($("#idKegiatan" + id).val());
   $('#namaKegiatan', window.parent.document).val($("#namaKegiatan" + id).val());
   $('#nilaiSpd', window.parent.document).val( accounting.formatNumber($("#nilaiSpd"+ id).val()) );

   
   parent.$.fancybox.close();
}
function grid( ) {
    var urljson = getbasepath()+"/kontrak/json/listpopupkegiatan";
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
                          {name: "namaskpd", value: $('#skpd').val()},
                          {name: "kodeskpd", value: $('#kodeskpd').val()},
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
                var idSpd = "<input type='hidden' id='idSpd" + aData['kegiatan']['idKegiatan'] + "' value='" + aData['spd']['idSpd'] + "' />";
                var idKegiatan = "<input type='hidden' id='idKegiatan" + aData['kegiatan']['idKegiatan'] + "' value='" + aData['kegiatan']['idKegiatan'] + "' />";
                var namaKegiatan = "<input type='hidden' id='namaKegiatan" + aData['kegiatan']['idKegiatan'] + "' value='" +  aData['kegiatan']['namaKegiatan'] + "' />";
                var nilaiSpd =  "<input type='hidden' id='nilaiSpd" + aData['kegiatan']['idKegiatan'] + "' value='" +  aData['nilaiSpd'] + "' />";
                var ceklis =  "<span class='icon-ok-sign linkpilihan></span>";
                $('td:eq(6)', nRow).html(accounting.formatNumber(aData['nilaiSpd']));
                $('td:eq(0)', nRow).html(index);
                $('td:eq(7)', nRow).html(idSpd + idKegiatan + namaKegiatan + nilaiSpd + "<span class='icon-ok-sign linkpilihan' onclick='ambilkegiatan(" + aData['kegiatan']['idKegiatan'] + ")'></span>");
                
                return nRow;
            },
              "aoColumns": [
                {"mDataProp": "spd.idSpd", "bSortable": false, sClass: "-"},
                {"mDataProp": "kegiatan.idKegiatan", "bSortable": true, sClass: "-"},
                {"mDataProp": "spd.idSpd", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kegiatan.namaKegiatan", "bSortable": true, sClass: "-", sDefaultContent: "-"},
                {"mDataProp": "refProgram.namaProgram", "bSortable": false, sClass: "-"},
                {"mDataProp": "urusan.namaUrusan", "bSortable": false, sClass: "-"},
                {"mDataProp": "nilaiSpd", "bSortable": false, sClass: "kanan"},
                {"mDataProp": "spd.idSpd", "bSortable": false, sClass: "center"}

            ]
           
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


