$(document).ready(function() {
    gridsppup();
});
function gridsppup() {
    var urljson = getbasepath() + "/validasispp/json/getlistsppvalidasi";
    if (typeof myTable == 'undefined') {
        myTable = $('#cetakspdtable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "bScrollCollapse": true,
            "bFilter": false,
            "sDom": '<"top"i>irt<"bottom"flp><"clear">',
            "sAjaxSource": urljson,
            "aaSorting": [[2, "asc"]],
            "fnDrawCallback": function() {

            },
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "idskpd", value: $('#idskpd').val()},
                {name: "namaskpd", value: $('#skpd').val()},
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
                $('td:eq(0)', nRow).html(index);
                $('td:eq(6)', nRow).html(accounting.formatNumber(aData['nilaiSpp']));
                var ttdnip = aData['dokTtd']['nip'] ? aData['dokTtd']['nip'] + "/" + aData['dokTtd']['nama'] + "/" + aData['dokTtd']['namaJabatan'] : '';
                var inputhiddenidpejabat = "<input type='hidden'  name='idpejabatppkd" + aData['id'] + "'   id='idpejabatppkd" + aData['id'] + "'  />";
                var spannamapejabat = "<span id='identitaspejabat" + aData['id'] + "' ></span>";
                var cekprint = "<input type='checkbox' name='cek" + aData['id'] + "'  id='cek" + aData['id'] + "' value='" + aData['id'] + "' class='checkbox' />";
                var buttonnamattd = aData['status'] == 'CETAK' ? cekprint : " ";

                $('td:eq(9)', nRow).html(inputhiddenidpejabat + spannamapejabat + ttdnip);
                $('td:eq(10)', nRow).html(buttonnamattd);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "id", "bSortable": false, sClass: "center"},
                {"mDataProp": "tahun", "bSortable": true, sClass: "center"},
                {"mDataProp": "bulan", "bSortable": true, sClass: "center"},
                {"mDataProp": "skpd.namaSkpd", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "noSpp", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "kodeBeban", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "nilaiSpp", "bSortable": true, sDefaultContent: "-", sClass: "kanan"},
                {"mDataProp": "status", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "tglSppSah", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "dokTtd.nama", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "id", "bSortable": false, sClass: "center"}
            ]
        });
        $("div.top").html("<span onclick=trigerval()  class='Button btn dark' style='float: right'>Proses Validasi</span>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }

}

function trigerval() {
    var baseurl = getbasepath();
    var selected = [];
    var statuscek = 0;
    $('.checkbox:checked').each(function() {
        var idspd = $(this).val();
        var map = {"id": idspd}
        selected.push(map);

    });

    $.ajax({
        type: "POST",
        url: baseurl + "/validasispp/json/insertsppvalidasi",
        contentType: "text/plain; charset=utf-8",
        dataType: "json",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(selected)
    }).always(function(data) {
        gridsppup();
        bootbox.alert(data.responseText);
    });

}

 