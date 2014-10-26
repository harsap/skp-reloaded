$(document).ready(function() {
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    $(".dropdown-toggle").dropdown();
    $("#dp1").datepicker({endDate: "+0d", language: "id", autoclose: "true", todayHighlight: "true"});
    $("#dp2").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp3").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp4").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp5").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp6").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp7").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp8").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp9").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#dp10").datepicker({endDate: "+0d", language: "id", autoclose: "true"});
    $("#loading").append("<div class='loadingAjax' id='ajaxBusy'><p><img src='${pageContext.request.contextPath}/static/ico/ajaxLoading.gif'></p></div>");
    $(document).ajaxStart(function() {
        $("#ajaxBusy").show()
    }).ajaxStop(function() {
        $("#ajaxBusy").hide()
    });
    $(".inputinvoice").priceFormat({prefix: "", suffix: "", centsSeparator: ",", thousandsSeparator: ".", limit: 15});
    $.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("^" + param + "$")) || value == ""
    }, "Hanya boleh huruf dan angka!");
    $.validator.addMethod("ruleWajib", function(value, element) {
        console.log(value);
        return parseFloat(accounting.unformat(value)) > 0
    }, "Wajib diisi .");
    $.validator.addMethod("ruleA03", function(value, element) {
        return this.optional(element) || /^[0-9.,]+$/.test(value)
    }, "Hanya boleh menggunakan angka dan simbol .");
    $.validator.addMethod("ruleA04", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value)
    }, "Hanya boleh menggunakan huruf dan angka");
    $.validator.addMethod("ruleA05", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9/.,+: '"()-]*$/i.test(value)
    }, "Hanya boleh menggunakan huruf, angka dan simbol .,''':+-/() spasi");
    $.validator.addMethod("ruleAlamat", function(value, element) {
        return this.optional(element) || /^[AC-IK-NP-TVWY\r\sa-zA-Z0-9/.,+: '"()-]*$/i.test(value)
    }, "Hanya boleh menggunakan huruf, angka dan simbol .,''':+-/() spasi enter");
    $.validator.addMethod("ruleCekKabupaten", function(value, element) {
        return eval(value) > 0
    }, "Wajib diisi .");
    $.validator.addMethod("indoDate", function(value, element) {
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) || value == ""
    }, " format hanya boleh dd/mm/yyyy.");
    $.validator.addMethod("ceknourutltklexist", function(value, element) {
        var result = false;
        var noltklself = "${noltkl}";
        if ($.trim(noltklself).length > 0) {
            var arrltkl = noltklself.split("-");
            result = arrltkl[2] == value ? true : false
        }
        if (!result) {
            $.ajax({type: "POST", async: false, url: "${pageContext.request.contextPath}/historyltkl/json/ceknoltklisexist", data: {noltklsegmendua: value}, success: function(data) {
                    result = data
                }})
        }
        return result
    }, "No urut   Sudah Digunakan")
    accounting.settings = {
        currency: {
            symbol: "Rp", // default currency symbol is '$'
            format: "%s%v", // controls output: %s = symbol, %v = value/number (can be object: see below)
            decimal: ",", // decimal point separator
            thousand: ".", // thousands separator
            precision: 2   // decimal places
        },
        number: {
            precision: 0, // default precision on numbers is 0
            thousand: ".",
            decimal: "," 
        }
    }
});
$(document).ajaxStart(function() {
    $("#ajaxBusy").show()
}).ajaxStop(function() {
    $("#ajaxBusy").hide()
});
function IsNumeric(a) {
    a = parseInt(a);
    return(a - 0) == a && a.length > 0
}
function popupwindow(f, d, e, a) {
    var c = (screen.width / 2) - (e / 2);
    var b = (screen.height / 2) - (a / 2);
    return window.open(f, d, "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=" + e + ", height=" + a + ", top=" + b + ", left=" + c)
}
function preventBack() {
    window.history.forward()
}
function settextbootalert(b, c, a) {
    $("#" + c).empty();
    $("#" + b).show();
    $("#" + c).html(a)
}
function closewindow() {
    document.webkitCancelFullScreen()
}
;