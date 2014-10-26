function grid(urljson) {
    $("#pejabatppkdtable").show();
    if (typeof myTable == 'undefined') {
        myTable = $('#pejabatppkdtable').dataTable({
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
            "aaSorting": [[2, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "kode", value: $('#kode').val()},
                        {name: "nilaiSpd", value:Number( $('#nilai').val())}
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
                var textnamaskpd = "<input type='hidden' id='namaPejabatPPKD" + aData['idPejabatPPKD'] + "' value='" +aData['namaPegawai']+ " / " +  aData['namaJabatan']  + "' />"
                $('td:eq(0)', nRow).html(index);
                $('td:eq(5)', nRow).html(textnamaskpd + "<span class='icon-ok-sign linkpilihan' onclick='ambilpejabat(" + aData['idPejabatPPKD'] + ")'></span>");
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idPejabatPPKD", "bSortable": false, sClass: "center"},
                {"mDataProp": "nip", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "nrk", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaPegawai", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaJabatan", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idPejabatPPKD", "bSortable": false, sClass: "center"}
            ]
        });

    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}

function ambilpejabat(id) {
        $('#namaPejabatPPKD', window.parent.document).val($("#namaPejabatPPKD" + id).val());
        $('#pejabatPpkd', window.parent.document).val(id);
        $('#idpejabatppkd'+$("#id").val(), window.parent.document).val(id);        
        $('#identitaspejabat'+$("#id").val(), window.parent.document).html($("#namaPejabatPPKD" + id).val());    
        parent.$.fancybox.close();
    }


