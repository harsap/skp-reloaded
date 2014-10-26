$(document).ready(function() {
    gridpagusppup();
});
function gridpagusppup() {
    var urljson = getbasepath() + "/referensi/spp/json/getlistspppaguup";
    if (typeof myTable == 'undefined') {
        myTable = $('#btlspdtable').dataTable({
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
                $(".inputmoney").priceFormat({prefix: "", suffix: "", centsSeparator: ",", thousandsSeparator: ".", limit: 15});
            },
            "fnServerParams": function(aoData) {
                aoData.push(
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
                var inputcek = "<input type='checkbox' class='cekpilih' value='" + aData['id'] + "' name='pilih" + index + "' id='pilih" + index + "'  />"
                var inputspp = "<input type='text'   id='nilaispp" + aData['id'] + "'    name='nilaispp" + aData['id'] + "'   value='" + accounting.formatNumber(aData['nilaiSpp'], 2, '.', ",") + "'   class='inputmoney'        />";
                var idskpd = "<input type='hidden'   id='idskpd" + aData['id'] + "'    name='idskpdX" + aData['id'] + "'    value='" + aData['skpd']['idSkpd'] + "'       />";

                $('td:eq(0)', nRow).html(index + idskpd);
                $('td:eq(3)', nRow).html(inputspp);
                $('td:eq(4)', nRow).html(inputcek);
                return nRow;
            },
            "aoColumns": [
                {"mDataProp": "id", "bSortable": false, sClass: "center"},
                {"mDataProp": "tahun", "bSortable": true, sClass: "center"},
                {"mDataProp": "skpd.namaSkpd", "bSortable": true, sDefaultContent: "-"},
                {"mDataProp": "nilaiSpp", "bSortable": true, sClass: "kanan", sDefaultContent: "-"},
                {"mDataProp": "id", "bSortable": false, sClass: "center"}
            ]
        });
        var inputtahunawal = "<input type='text' id='tahunawal' name='tahunawal' size='6' maxlength='4' class='form-control' />";
        var inputtahunakhir = "<input type='text' id='tahunakhir' name='tahunakhir' size='6' maxlength='4' class='form-control' />";
        var tombol = "<span onclick=pindahtahun() class='btn blue' >Pindah Ke History</span>";
        $("div.top").html("<div  style='float: right'>Data Tahun  " + inputtahunawal + " Pindah ke " + inputtahunakhir + "&nbsp;" + tombol + "</div>");
    }
    else
    {
        myTable.fnClearTable(0);
        myTable.fnDraw();
    }

}
function pindahtahun() {
    var varurl = getbasepath() + "/referensi/spp/json/prosespindahtahun";
    var dataac = {"tahunlama":$("#tahunawal").val(),"tahunbaru":$("#tahunakhir").val()}
    return   $.ajax({
        type: "POST",
        url: varurl,
        contentType: "text/plain; charset=utf-8",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(dataac)
    }).always(function(data) {
        gridpagusppup();
        bootbox.alert(data.responseText);
    });
}
function submitnilaispp( ) {
    var varurl = getbasepath() + "/referensi/spp/json/prosessimpan";
    var dataac = [];
    $(".cekpilih:checked").each(function() {
        var datapeg = {
            idspp: $(this).val(),
            nilaispp: $("#nilaispp" + $(this).val()).val()
        }
        dataac.push(datapeg);
    });
    return   $.ajax({
        type: "POST",
        url: varurl,
        contentType: "text/plain; charset=utf-8",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(dataac)
    }).always(function(data) {
        gridpagusppup();
        bootbox.alert(data.responseText);
    });

}