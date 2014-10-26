$(".date-picker").datepicker({endDate: "+0d", language: "id", autoclose: "true", todayHighlight: "true"});
$(".date-picker2").datepicker({  language: "id", autoclose: "true", todayHighlight: "true"});
$(".entrytanggal").mask("99/99/9999");
var now = new Date();
$(".entrybulan").mask("99/" + now.getFullYear());
$(".fancybox").fancybox({
    width: '100%',
    height: '100%',
    autoScale: false,
    autoDimensions: false,
    closeClick: true,
    openEffect: 'swing',
    closeEffect: 'swing',
    headers: {'X-fancyBox': true}
});
$("form").validate();
function getTanggal(tgl) {
    if (tgl != null && tgl != '') {
        var tglarr = tgl.split("-");
        return tglarr[2] + "/" + tglarr[1] + "/" + tglarr[0];
    } else {
        return "-";
    }
}
