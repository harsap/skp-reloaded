$(document).ready(function() {

    if ($("#idskpd").val()) {
        getpagudanspd($("#idskpd").val())
    }
    gridspprinci();


});
function getpagudanspd(idskpd) {
    $.getJSON(getbasepath() + "/sppup/json/getanggarandanspdbantuanlangsung/" + idskpd,
            function(result) {
                $('#totalAngaran').val(accounting.formatNumber(result.anggaran));
                $('#nilaiSpd').val(accounting.formatNumber(result.spd));
            });

}
function getbanyakspdrinci( ) {
    $.getJSON(getbasepath() + "/sppup/json/getlistspdblbanyak", {tahunAnggaran: $("#tahun").val(), idskpd: $("#idskpd").val()},
    function(result) {
        $('#banyakrinci').val(result);
    });

}
function pindahhalamanadepan() {
    var idskpd = $.trim($("#idskpd").val());
    if (idskpd) {
        window.location.replace(getbasepath() + "/spmup/indexspmup/" + idskpd);
    } else {
        window.location.replace(getbasepath() + "/spmup/indexspmup");
    }

}
function cekall(obj) {
    if ($(obj).is(":checked")) {
        $("#spprincitable :input[type='text']").attr("readonly", false);
    } else {
        $("#spprincitable :input[type='text']").attr("readonly", "readonly");
    }
}
function gridspprinci() {
    var urljson = getbasepath() + "/sppup/json/getlistspdbl";
    if (typeof myTable == 'undefined') {
        myTable = $('#spprincitable').dataTable({
            "bPaginate": true,
            "sPaginationType": "bootstrap",
            "bJQueryUI": false,
            "bProcessing": true,
            "bServerSide": true,
            "autoWidth": false,
            "bInfo": true,
            "bScrollCollapse": true,
            "bFilter": false,
            "sAjaxSource": urljson,
            "aaSorting": [[2, "asc"]],
            "fnDrawCallback": function() {
                $(".inputmoney").priceFormat({prefix: "", suffix: "", centsSeparator: ",", thousandsSeparator: ".", limit: 15});
            },
            "fnServerParams": function(aoData) {
                aoData.push(
                        {name: "idskpd", value: $('#idskpd').val()},
                {name: "tahunAnggaran", value: $('#tahun').val()}
                );
            },
            "fnFooterCallback": function(nRow, aaData, iStart, iEnd, iDisplay) {
                var pageTotal = 0;
                var spptotal = 0;
                if (aaData.length > 0) {
                    for (var i = iStart; i < iEnd; i++) {
                        pageTotal += parseFloat(aaData[i]['nilaiSpd']);
                        spptotal += parseFloat(aaData[i]['nilaiSpp']);
                    }
                }

                $("#totalspd").val(accounting.formatNumber(pageTotal, 2, '.', ","))
                $("#totalspp").val(accounting.formatNumber(spptotal, 2, '.', ","))

            }
            ,
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
                var idspd = "<input type='hidden' id='idspd" + aData['idBl'] + "'   name='idspd" + aData['idBl'] + "'  value='" + aData['idSpd'] + "'  />";
                var idkegiatan = "<input type='hidden' id='idkegiatan" + aData['idBl'] + "'   name='idkegiatan" + aData['idBl'] + "'  value='" + aData['kegiatan']['idKegiatan'] + "'  />";
                var idakun = "<input type='hidden' id='idakun" + aData['idBl'] + "'   name='idakun" + aData['idBl'] + "'  value='" + aData['akun']['idAkun'] + "'  />";
                var noSpd = "<input type='hidden' name='noSpd'     kode='noSpd' value='" + aData['noSpd'] + "' />";


                var inputcek = "<input type='hidden'   value='" + aData['idBl'] + "' name='cekpilih" + index + "' id='cekpilih" + index + "'   />";
               
                var namaakun = "<input type='text' name='namaAkun'  style='border:none;margin:0;width:99%;'  kode='namaAkun' value='" + aData['akun']['namaAkun'] + "' />"
                var namaKegiatan = "<input type='text' name='namaKegiatan'  style='border:none;margin:0;width:99%;' readonly='true'  kode='namaKegiatan' value='" + aData['kegiatan']['namaKegiatan'] + "' />"
                var nilaispd = accounting.formatNumber(aData['nilaiSpd'], 2, '.', ",");
                var nilaispdtext = "<input type='text' name='nilaispd" + aData['idBl'] + "' id='nilaispd" + aData['idBl'] + "'  class='inputmoney'  readonly='true'   value='" + nilaispd + "' />"
                var nilaispp = accounting.formatNumber(aData['nilaiSpp'], 2, '.', ",");
                var nilaispptext = "<input type='text' name='nilaispp" + aData['idBl'] + "' id='nilaispp" + aData['idBl'] + "'  class='inputmoney'  readonly='true'     onkeyup='pasangvalidatebesarperfield(" + aData['idBl'] + ");hitungnilaispp()'   value='" + nilaispp + "'   />"

                $('td:eq(0)', nRow).html(index + idspd + idkegiatan + idakun+inputcek);
                $('td:eq(3)', nRow).html(namaakun);
                $('td:eq(5)', nRow).html(namaKegiatan);
                $('td:eq(6)', nRow).html(nilaispdtext);
                $('td:eq(7)', nRow).html(nilaispptext);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "idBl", "bSortable": false, sClass: "center", "sWidth": "4%"},
                {"mDataProp": "noSpd", "bSortable": true, "sWidth": "8%"},
                {"mDataProp": "akun.kodeAkun", "bSortable": true, "sWidth": "8%"},
                {"mDataProp": "akun.namaAkun", "bSortable": true, "sWidth": "17%"},
                {"mDataProp": "kegiatan.kodeKegiatan", "bSortable": true, "sWidth": "8%"},
                {"mDataProp": "kegiatan.namaKegiatan", "bSortable": true, "sWidth": "17%"},
                {"mDataProp": "nilaiSpd", "bSortable": false, sClass: "kanan", "sWidth": "12%"},
                {"mDataProp": "nilaiSpp", "bSortable": false, sClass: "kanan", "sWidth": "12%"}
            ]
        });


    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }
    getbanyakspdrinci( );
}

 