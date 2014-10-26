$(document).ready(function() {
   grid(); 
});
function ambilrekanan(id) {
    
   $('#namaDirekturRekanan', window.parent.document).val($("#namaDirekturRekanan" + id).val());
   $('#alamatRekanan', window.parent.document).val($("#alamatRekanan" + id).val());
   $('#rekanan', window.parent.document).val($("#namaRekanan" + id).val());
   $('#idRekanan', window.parent.document).val($("#idRekanan" + id).val());
   $('#idRekananNpwp', window.parent.document).val($("#idRekananNpwp" + id).val());
   $('#kodeRekananc', window.parent.document).val($("#kodeRekanan" + id).val());
   $('#idRekananAktec', window.parent.document).val($("#idRekananAkte" + id).val());
   $('#tanggalRekananAktec', window.parent.document).val($("#tanggalRekananAkte" + id).val());
   $('#idrekanan', window.parent.document).val(id).change();
    parent.$.fancybox.close();
}
function grid( ) {
    var urljson = getbasepath()+"/kontrak/json/listpopuprekanan";
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
                var namaRekanan = "<input type='hidden' id='namaRekanan" + aData['idRekanan'] + "' value='" + aData['namaRekanan'] + "' />";
                var idRekananAkte = "<input type='hidden' id='idRekananAkte" + aData['idRekanan'] + "' value='" + aData['idRekananAkte'] + "' />";
                var tanggalRekananAkte = "<input type='hidden' id='tanggalRekananAkte" + aData['idRekanan'] + "' value='" + getTanggal(aData['tanggalRekananAkte']) + "' />";
                var idRekanan = "<input type='hidden' id='idRekanan" + aData['idRekanan'] + "' value='" + aData['idRekanan'] + "' />";
                var idRekananNpwp = "<input type='hidden' id='idRekananNpwp" + aData['idRekanan'] + "' value='" + aData['idRekananNpwp'] + "' />";
                var kodeRekanan = "<input type='hidden' id='kodeRekanan" + aData['idRekanan'] + "' value='" + aData['kodeRekanan'] + "' />";
                var alamatRekanan = "<input type='hidden' id='alamatRekanan" + aData['idRekanan'] + "' value='" + aData['alamatRekanan'] + "' />";
                var namaDirekturRekanan = "<input type='hidden' id='namaDirekturRekanan" + aData['idRekanan'] + "' value='" + aData['namaDirekturRekanan'] + "' />";
                
                $('td:eq(0)', nRow).html(index);
                $('td:eq(4)', nRow).html(namaRekanan + idRekananNpwp + tanggalRekananAkte + idRekananAkte +kodeRekanan + alamatRekanan + namaDirekturRekanan + "<span class='icon-ok-sign linkpilihan' onclick='ambilrekanan(" + aData['idRekanan'] + ")'></span>");
                
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idRekanan", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaDirekturRekanan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idRekanan", "bSortable": false, sClass: "center"}
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


