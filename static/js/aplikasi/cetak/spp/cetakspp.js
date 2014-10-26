$(document).ready(function() {
    gridsppup();
});
function gridsppup() {
    var urljson = getbasepath() + "/cetakspp/json/getlistspppcetak";
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
                $(".checkbox").hide();
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
                var donlod = aData['status'] == 'CETAK' || aData['status'] == 'VALIDASI' ? "<a href='" + getbasepath() + "/sppup/edispppup/" + aData['id'] + "' class='icon-download' ></a>" : '';
                $('td:eq(0)', nRow).html(index);
                $('td:eq(6)', nRow).html(accounting.formatNumber(aData['nilaiSpp']));
                var ttdnip = aData['dokTtd']['nip'] ? aData['dokTtd']['nip'] + "/" + aData['dokTtd']['nama'] + "/" + aData['dokTtd']['namaJabatan'] : '';
                var inputhiddenidpejabat = "<input type='hidden'  name='idpejabatppkd" + aData['id'] + "'   id='idpejabatppkd" + aData['id'] + "'  />";
                var spannamapejabat = "<span id='identitaspejabat" + aData['id'] + "' ></span>";
                var buttonnamattd = aData['status'] == 'PENGAJUAN' ? '<a  onclick="tampilcek(' + aData['id'] + ')" class="fancybox fancybox.iframe btn dark" href="' + getbasepath() + '/common/listpejabatppkd/' + aData['id'] + '/SPP/' + aData['nilaiSpp'] + '?target=top" title="Pilih PejabatPPKD"  ><i class="icon-zoom-in"></i></a>' : " ";

                $('td:eq(9)', nRow).html(inputhiddenidpejabat + spannamapejabat + ttdnip + "&nbsp;" + buttonnamattd);
                var cekprint = "<input type='checkbox' name='cek" + aData['id'] + "'  id='cek" + aData['id'] + "' value='" + aData['id'] + "' class='checkbox' />";
                $('td:eq(10)', nRow).html(cekprint);
                $('td:eq(11)', nRow).html(donlod);
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
                {"mDataProp": "tglSppCetak", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "dokTtd.nama", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "id", "bSortable": false, sClass: "center"},
                {"mDataProp": "id", "bSortable": false, sClass: "center"}
            ]
        });
        $("div.top").html("<span onclick=trigercetak()  class='Button btn dark' style='float: right'>Proses Cetak</span>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }

}

function trigercetak() {
    var baseurl = getbasepath();
    var selected = [];
    var statuscek = 0;
    $('.checkbox:checked').each(function() {
        var idspd = $(this).val();
        var idpejabatppkd = $("#idpejabatppkd" + idspd).val();
        if (idpejabatppkd == null || idpejabatppkd == '' || idpejabatppkd == 'undefined' || $.trim(idpejabatppkd).length < 1) {
            statuscek++;
        } else {
            var map = {"id": idspd, "idpejabatttd": idpejabatppkd}
            selected.push(map);
        }

    });
    if (statuscek == 0) {
        $.ajax({
            type: "POST",
            url: baseurl + "/cetakspp/json/insertsppcetak",
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
    } else {
        bootbox.alert("Pejabat penandatangan wajib dipilih sebelum cetak!");
    }
}

function tampilcek(id) {
    $("#cek" + id).show();
}