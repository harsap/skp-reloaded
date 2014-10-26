$(document).ready(function() {
    grid();
});

function ambilskpd(id) {
    $('#skpd', window.parent.document).val($("#namaSkpd" + id).val());
    $('#idskpd', window.parent.document).val(id).change();
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
            "sAjaxSource": getbasepath() + "/bankrek/json/listbankrekjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "bankrek", value: $('#namabankrek').val()}
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
                var isceked = aData['isAktif'] == '1' ? 'checked' : '';
                var cekaktif = "<input type='checkbox' name='isaktif" + index + "' id='isaktif" + index + "' disabled  " + isceked + " />";
                var pilih = "<a class='icon-edit' href='" + getbasepath() + "/bankrek/updatebankrek/" + aData['idBankrek'] + "'  ></a> - <a class='icon-remove' href='" + getbasepath() + "/bankrek/delbankrek/" + aData['idBankrek'] + "' ></a>";

                $('td:eq(0)', nRow).html(index);
                $('td:eq(1)', nRow).html(aData['skpd']['kodeSkpd'] + " - " + aData['skpd']['namaSkpd']);
                $('td:eq(8)', nRow).html(cekaktif);
                $('td:eq(9)', nRow).html(pilih);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idBankrek", "bSortable": false, sClass: "center"},
                {"mDataProp": "skpd.idSkpd", "bSortable": false},
                {"mDataProp": "kodeBankrek", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaBankrek", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idBANKSTS", "bSortable": false, sClass: "center"},
                {"mDataProp": "idBANKSPM", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeThnBerlaku", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeThnBerakhir", "bSortable": false, sClass: "center"},
                {"mDataProp": "isAktif", "bSortable": false, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idBankrek", "bSortable": false, sDefaultContent: "-", sClass: "center"}

            ]
        });
        $("div.top").html("<a  href='" + getbasepath() + "/bankrek/addbankrek' class='btn blue' style='float: right'>Tambah Data</a>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
}


function gridpopup( ) {
    if (typeof spmTable == 'undefined') {
        spmTable = $('#spmbanktable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "bInfo": true,
            "bScrollCollapse": true,
            "bFilter": false,
            "sAjaxSource": getbasepath() + "/bankrek/json/listbankrekjson",
            "aaSorting": [[1, "asc"]],
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "idskpd", value: $('#idskpd').val()},
                {name: "bankrek", value: $('#namabankrek').val()}
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
                var isceked = aData['isAktif'] == '1' ? 'checked' : '';
                var cekaktif = "<input type='checkbox' name='isaktif" + index + "' id='isaktif" + index + "' disabled  " + isceked + " />";
                var pilih = "<span class='icon-check' title='klik disini untuk memilih rekening' class='link' onclick='ambilrekeningbank(" + aData['idBankrek'] + ")'   ></span> ";
                var hidkodebank = "<input type='hidden' name='kodebank" + aData['idBankrek'] + "'  id='kodebank" + aData['idBankrek'] + "'  value='" + aData['kodeBankrek'] + "' />";
                var hidnamabank = "<input type='hidden' name='namabank" + aData['idBankrek'] + "'  id='namabank" + aData['idBankrek'] + "'  value='" + aData['namaBankrek'] + "' />";
                var hidnorek = "<input type='hidden' name='norekspm" + aData['idBankrek'] + "'  id='norekspm" + aData['idBankrek'] + "'  value='" + aData['idBANKSPM'] + "' />";

                $('td:eq(0)', nRow).html(index);
                $('td:eq(1)', nRow).html(aData['skpd']['kodeSkpd'] + " - " + aData['skpd']['namaSkpd']);
                $('td:eq(8)', nRow).html(cekaktif);
                $('td:eq(9)', nRow).html(pilih + hidkodebank + hidnamabank + hidnorek);

                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idBankrek", "bSortable": false, sClass: "center"},
                {"mDataProp": "skpd.idSkpd", "bSortable": false},
                {"mDataProp": "kodeBankrek", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "namaBankrek", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "idBANKSTS", "bSortable": false, sClass: "center"},
                {"mDataProp": "idBANKSPM", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeThnBerlaku", "bSortable": false, sClass: "center"},
                {"mDataProp": "kodeThnBerakhir", "bSortable": false, sClass: "center"},
                {"mDataProp": "isAktif", "bSortable": false, sDefaultContent: "-", sClass: "center"},
                {"mDataProp": "idBankrek", "bSortable": false, sDefaultContent: "-", sClass: "center"}

            ]
        });

    }
    else
    {
        spmTable.fnClearTable(0);
        spmTable.fnDraw();
    }
}

function ambilrekeningbank(id) {
    $('#kodeBank', window.parent.document).val($("#kodebank" + id).val());
    $('#namaBank', window.parent.document).val($("#namabank" + id).val());
    $('#noRekeningSPM', window.parent.document).val($("#norekspm" + id).val());
    parent.$.fancybox.close();
}